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

use P8p\Sdk\Api\Apps\V1\DeploymentApi;
use P8p\Sdk\Schema\Apps\V1\Deployment;
use P8p\Sdk\Schema\Apps\V1\DeploymentSpec;
use P8p\Sdk\Schema\Core\V1\Container;
use P8p\Sdk\Schema\Core\V1\PodSpec;
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;
use P8p\Sdk\Schema\Meta\V1\LabelSelector;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

/**
 * Tests the PatchStatus operation against a real Kubernetes cluster using a Grouped API.
 */
class PatchStatusOperationGroupedApiTest extends AbstractFunctional
{
    private DeploymentApi $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(DeploymentApi::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupResources(DeploymentApi::class);
        parent::tearDown();
    }

    public function testPatchStatusOfExistingDeployment(): void
    {
        // Create a Deployment
        $name = $this->generateTestResourceName('deploy-patchstatus-existing');
        $labels = ['app' => 'nginx', 'test' => 'patchstatus'];

        $deployment = new Deployment(
            metadata: $this->createMetadata($name, $labels),
            spec: new DeploymentSpec(
                selector: new LabelSelector(matchLabels: $labels),
                template: new PodTemplateSpec(
                    metadata: new ObjectMeta(labels: $labels),
                    spec: new PodSpec(
                        containers: [
                            new Container(
                                name: 'nginx',
                                image: 'nginx:latest'
                            ),
                        ]
                    )
                ),
                replicas: 1
            )
        );

        $createResponse = $this->api->create($this->namespace, $deployment);
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
        $this->assertInstanceOf(Deployment::class, $updated);
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

    public function testPatchStatusNonExistentDeployment(): void
    {
        $name = 'non-existent-deployment-'.uniqid();
        $patch = [
            'status' => [
                'replicas' => 1,
            ],
        ];

        $this->expectException(\Throwable::class);
        $this->api->patchStatus($name, $this->namespace, $patch)->getContent();
    }
}
