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
use P8p\Sdk\Schema\Apps\V1\DeploymentCondition;
use P8p\Sdk\Schema\Apps\V1\DeploymentSpec;
use P8p\Sdk\Schema\Apps\V1\DeploymentStatus;
use P8p\Sdk\Schema\Core\V1\Container;
use P8p\Sdk\Schema\Core\V1\PodSpec;
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;
use P8p\Sdk\Schema\Meta\V1\LabelSelector;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

/**
 * Tests the ReplaceStatus operation against a real Kubernetes cluster using a Grouped API.
 */
class ReplaceStatusOperationGroupedApiTest extends AbstractFunctional
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

    public function testReplaceStatusOfExistingDeployment(): void
    {
        // Create a Deployment
        $name = $this->generateTestResourceName('deploy-replacestatus-existing');
        $labels = ['app' => 'nginx', 'test' => 'replacestatus'];

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

        sleep(2);

        // Read the current status
        $readResponse = $this->api->readStatus($name, $this->namespace);
        $this->assertTrue($readResponse->isSuccessful());
        $deploymentWithStatus = $readResponse->getContent();

        // Modify the status by adding a custom condition
        $customCondition = new DeploymentCondition(
            status: 'True',
            type: 'CustomCondition',
            message: 'This is a test condition',
            reason: 'TestReason'
        );

        $conditions = $deploymentWithStatus->status?->conditions ?? [];
        $conditions[] = $customCondition;

        $deploymentWithStatus->status = new DeploymentStatus(
            availableReplicas: $deploymentWithStatus->status?->availableReplicas,
            conditions: $conditions,
            observedGeneration: $deploymentWithStatus->status?->observedGeneration,
            readyReplicas: $deploymentWithStatus->status?->readyReplicas,
            replicas: $deploymentWithStatus->status?->replicas
        );

        // Replace the status
        $response = $this->api->replaceStatus($name, $this->namespace, $deploymentWithStatus);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Deployment::class, $updated);
        $this->assertSame($name, $updated->metadata?->name);

        // Verify the custom condition was added
        $updatedConditions = $updated->status?->conditions ?? [];
        $hasCustomCondition = false;
        foreach ($updatedConditions as $condition) {
            if ('CustomCondition' === $condition->type) {
                $hasCustomCondition = true;
                $this->assertSame('TestReason', $condition->reason);
                break;
            }
        }
        $this->assertTrue($hasCustomCondition, 'Custom condition should be present in updated status');
    }

    public function testReplaceStatusNonExistentDeployment(): void
    {
        $name = 'non-existent-deployment-'.uniqid();
        $labels = ['app' => 'nginx'];

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

        $this->expectException(\Throwable::class);
        $this->api->replaceStatus($name, $this->namespace, $deployment)->getContent();
    }
}
