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
use P8p\Sdk\Schema\Core\V1\PodSpec;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;

/**
 * Tests the ReadStatus operation against a real Kubernetes cluster.
 */
class ReadStatusOperationTest extends AbstractFunctional
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

    public function testReadStatusOfExistingPod(): void
    {
        // Create a Pod
        $name = $this->generateTestResourceName('pod-readstatus-existing');
        $pod = new Pod(
            metadata: $this->createMetadata($name, ['test' => 'readstatus']),
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
        $this->createdPods[] = $name;

        // Read the Pod status
        $response = $this->api->readStatus($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $podWithStatus = $response->getContent();
        $this->assertInstanceOf(Pod::class, $podWithStatus);
        $this->assertSame($name, $podWithStatus->metadata?->name);

        // Verify status is present
        $this->assertNotNull($podWithStatus->status);
        $this->assertNotNull($podWithStatus->status->phase);
    }

    public function testReadStatusNonExistentPod(): void
    {
        $name = 'non-existent-pod-'.uniqid();

        $this->expectException(\Throwable::class);
        $this->api->readStatus($name, $this->namespace)->getContent();
    }

    public function testReadStatusVerifyPodPhase(): void
    {
        // Create a Pod
        $name = $this->generateTestResourceName('pod-readstatus-phase');
        $pod = new Pod(
            metadata: $this->createMetadata($name),
            spec: new PodSpec(
                containers: [
                    new Container(
                        name: 'busybox',
                        image: 'busybox:latest',
                        command: ['sleep', '3600']
                    ),
                ]
            )
        );

        $createResponse = $this->api->create($this->namespace, $pod);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdPods[] = $name;

        // Read the Pod status
        $response = $this->api->readStatus($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $podWithStatus = $response->getContent();
        $this->assertInstanceOf(Pod::class, $podWithStatus);

        // Phase should be Pending or Running
        $this->assertContains(
            $podWithStatus->status?->phase,
            ['Pending', 'Running']
        );
    }
}
