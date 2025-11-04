<?php

/*
 * This file is part of the P8P project.
 *
 * (c) Julien Jacottet <jjacottet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace P8p\Sdk\Tests\Functional;

use P8p\Sdk\Api\Core\V1\PodApi;
use P8p\Sdk\Schema\Core\V1\Container;
use P8p\Sdk\Schema\Core\V1\Pod;
use P8p\Sdk\Schema\Core\V1\PodCondition;
use P8p\Sdk\Schema\Core\V1\PodSpec;
use P8p\Sdk\Schema\Core\V1\PodStatus;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;

/**
 * Tests the ReplaceStatus operation against a real Kubernetes cluster.
 */
class ReplaceStatusOperationTest extends AbstractFunctional
{
    private PodApi $api;
    /** @var array<string> */
    private array $createdPods = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(PodApi::class);
    }

    protected function tearDown(): void
    {
        // Clean up all created Pods
        foreach ($this->createdPods as $name) {
            try {
                $this->api->delete(
                    name: $name,
                    namespace: $this->namespace,
                    body: new DeleteOptions()
                );
            } catch (\Throwable) {
                // Ignore errors during cleanup
            }
        }

        parent::tearDown();
    }

    public function testReplaceStatusOfExistingPod(): void
    {
        // Create a Pod
        $name = $this->generateTestResourceName('pod-replacestatus-existing');
        $pod = new Pod(
            metadata: $this->createMetadata($name, ['test' => 'replacestatus']),
            spec: new PodSpec(
                containers: [
                    new Container(
                        name: 'nginx',
                        image: 'nginx:latest'
                    ),
                ]
            )
        );

        $createResponse = $this->api->create($this->namespace, $pod);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdPods[] = $name;

        // Read the current status
        $readResponse = $this->api->readStatus($name, $this->namespace);
        $this->assertTrue($readResponse->isSuccessful());
        $podWithStatus = $readResponse->getContent();

        // Modify the status by adding a custom condition
        $customCondition = new PodCondition(
            type: 'CustomCondition',
            status: 'True',
            reason: 'TestReason',
            message: 'This is a test condition'
        );

        $conditions = $podWithStatus->status?->conditions ?? [];
        $conditions[] = $customCondition;

        $podWithStatus->status = new PodStatus(
            phase: $podWithStatus->status?->phase,
            conditions: $conditions,
            hostIP: $podWithStatus->status?->hostIP,
            podIP: $podWithStatus->status?->podIP,
            startTime: $podWithStatus->status?->startTime
        );

        // Replace the status
        $response = $this->api->replaceStatus($name, $this->namespace, $podWithStatus);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Pod::class, $updated);
        $this->assertSame($name, $updated->metadata?->name);

        // Verify the custom condition was added
        $updatedConditions = $updated->status?->conditions ?? [];
        $hasCustomCondition = false;
        foreach ($updatedConditions as $condition) {
            if ($condition->type === 'CustomCondition') {
                $hasCustomCondition = true;
                $this->assertSame('TestReason', $condition->reason);
                break;
            }
        }
        $this->assertTrue($hasCustomCondition, 'Custom condition should be present in updated status');
    }

    public function testReplaceStatusNonExistentPod(): void
    {
        $name = 'non-existent-pod-'.uniqid();
        $pod = new Pod(
            metadata: $this->createMetadata($name),
            spec: new PodSpec(
                containers: [
                    new Container(
                        name: 'nginx',
                        image: 'nginx:latest'
                    ),
                ]
            )
        );

        $this->expectException(\Throwable::class);
        $this->api->replaceStatus($name, $this->namespace, $pod)->getContent();
    }
}
