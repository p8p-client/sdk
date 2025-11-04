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

use P8p\Sdk\Api\Core\V1\ConfigMapApi;
use P8p\Sdk\Schema\Core\V1\ConfigMap;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

/**
 * Tests the Delete operation against a real Kubernetes cluster.
 */
class DeleteOperationTest extends AbstractFunctional
{
    private ConfigMapApi $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(ConfigMapApi::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupResources(ConfigMapApi::class);
        parent::tearDown();
    }

    public function testDeleteExistingConfigMap(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-delete-basic');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete the ConfigMap
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();
        $this->assertInstanceOf(Status::class, $result);

        // Verify the ConfigMap no longer exists
        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }

    public function testDeleteNonExistentConfigMapFails(): void
    {
        $name = $this->generateTestResourceName('cm-delete-nonexistent');

        $this->expectException(\Throwable::class);
        $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        )->getContent();
    }

    public function testDeleteWithGracePeriodSeconds(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-delete-grace');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete with gracePeriodSeconds
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['gracePeriodSeconds' => 0]
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteWithPropagationPolicy(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-delete-propagation');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete with propagationPolicy
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['propagationPolicy' => 'Foreground']
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteWithDeleteOptions(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-delete-options');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete with DeleteOptions body
        $deleteOptions = new DeleteOptions(
            gracePeriodSeconds: 0,
            propagationPolicy: 'Background'
        );

        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: $deleteOptions
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteMultipleConfigMaps(): void
    {
        // Create multiple ConfigMaps
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("cm-delete-multi-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name)
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
            $names[] = $name;
        }

        // Delete each ConfigMap
        foreach ($names as $name) {
            $response = $this->api->delete(
                name: $name,
                namespace: $this->namespace,
                body: new DeleteOptions()
            );
            $this->assertTrue($response->isSuccessful());
        }

        // Verify all ConfigMaps are deleted
        foreach ($names as $name) {
            try {
                $this->api->read($name, $this->namespace)->getContent();
                $this->fail("ConfigMap $name should have been deleted");
            } catch (\Throwable) {
                // Expected - ConfigMap no longer exists
                $this->assertTrue(true);
            }
        }
    }

    public function testDeleteConfigMapWithLabels(): void
    {
        // Create a ConfigMap with labels
        $name = $this->generateTestResourceName('cm-delete-labels');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, ['app' => 'test', 'env' => 'dev'])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete the ConfigMap
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        );

        $this->assertTrue($response->isSuccessful());

        // Verify it's deleted
        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }
}
