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
use P8p\Sdk\Schema\Core\V1\LabelSelector;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;
use P8p\Sdk\Schema\Core\V1\PodSpec;
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;

/**
 * Tests the ReadStatus operation against a real Kubernetes cluster using a Grouped API.
 */
class ReadStatusOperationGroupedApiTest extends AbstractFunctional
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

    public function testReadStatusOfExistingDeployment(): void
    {
        // Create a Deployment
        $name = $this->generateTestResourceName('deploy-readstatus-existing');
        $labels = ['app' => 'nginx', 'test' => 'readstatus'];

        $deployment = new Deployment(
            metadata: $this->createMetadata($name, $labels),
            spec: new DeploymentSpec(
                replicas: 1,
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
                )
            )
        );

        $createResponse = $this->api->create($this->namespace, $deployment);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the Deployment status
        $response = $this->api->readStatus($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $deploymentWithStatus = $response->getContent();
        $this->assertInstanceOf(Deployment::class, $deploymentWithStatus);
        $this->assertSame($name, $deploymentWithStatus->metadata?->name);
        $this->assertSame($this->namespace, $deploymentWithStatus->metadata?->namespace);

        // Verify status is present
        $this->assertNotNull($deploymentWithStatus->status);
    }

    public function testReadStatusNonExistentDeployment(): void
    {
        $name = 'non-existent-deployment-'.uniqid();

        $this->expectException(\Throwable::class);
        $this->api->readStatus($name, $this->namespace)->getContent();
    }

    public function testReadStatusVerifyReplicaFields(): void
    {
        // Create a Deployment with 2 replicas
        $name = $this->generateTestResourceName('deploy-readstatus-replicas');
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
                replicas: 2
            )
        );

        $createResponse = $this->api->create($this->namespace, $deployment);
        $this->assertTrue($createResponse->isSuccessful());

        // Wait a bit for the deployment to be processed
        sleep(2);

        // Read the Deployment status
        $response = $this->api->readStatus($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $deploymentWithStatus = $response->getContent();
        $this->assertInstanceOf(Deployment::class, $deploymentWithStatus);

        // Status should have replica information
        $this->assertNotNull($deploymentWithStatus->status);
        $this->assertIsInt($deploymentWithStatus->status->replicas);
    }
}
