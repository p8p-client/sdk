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

/**
 * Tests the PatchStatus operation against a real Kubernetes cluster.
 */
class PatchStatusOperationTest extends AbstractFunctional
{
    private PodApi $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(PodApi::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupResources(PodApi::class);
        parent::tearDown();
    }

    public function testPatchStatusOfExistingPod(): void
    {
        // Create a Pod
        $name = $this->generateTestResourceName('pod-patchstatus-existing');
        $pod = new Pod(
            metadata: $this->createMetadata($name, ['test' => 'patchstatus']),
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

        // Patch the status by adding a custom condition
        $patch = [
            'status' => [
                'conditions' => [
                    [
                        'type' => 'CustomPatchCondition',
                        'status' => 'True',
                        'reason' => 'PatchTestReason',
                        'message' => 'This is a patch test condition',
                    ],
                ],
            ],
        ];

        // Patch the status
        $response = $this->api->patchStatus($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Pod::class, $updated);
        $this->assertSame($name, $updated->metadata?->name);

        // Verify the custom condition was added
        $updatedConditions = $updated->status?->conditions ?? [];
        $hasCustomCondition = false;
        foreach ($updatedConditions as $condition) {
            if ('CustomPatchCondition' === $condition->type) {
                $hasCustomCondition = true;
                $this->assertSame('PatchTestReason', $condition->reason);
                break;
            }
        }
        $this->assertTrue($hasCustomCondition, 'Custom condition should be present in patched status');
    }

    public function testPatchStatusNonExistentPod(): void
    {
        $name = 'non-existent-pod-'.uniqid();
        $patch = [
            'status' => [
                'phase' => 'Running',
            ],
        ];

        $this->expectException(\Throwable::class);
        $this->api->patchStatus($name, $this->namespace, $patch)->getContent();
    }
}
