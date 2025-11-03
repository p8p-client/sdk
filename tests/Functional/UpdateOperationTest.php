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

/**
 * Tests the Update (Replace) operation against a real Kubernetes cluster.
 */
class UpdateOperationTest extends AbstractFunctional
{
    private ConfigMapApi $api;
    /** @var array<string> */
    private array $createdConfigMaps = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(ConfigMapApi::class);
    }

    protected function tearDown(): void
    {
        // Clean up all created ConfigMaps
        foreach ($this->createdConfigMaps as $name) {
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

    public function testUpdateConfigMapData(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-data');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Update the ConfigMap data
        $created->data = ['key1' => 'updated-value1', 'key3' => 'value3'];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertSame(['key1' => 'updated-value1', 'key3' => 'value3'], $updated->data);
        $this->assertNotSame($created->metadata?->resourceVersion, $updated->metadata?->resourceVersion);
    }

    public function testUpdateConfigMapLabels(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-labels');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, ['env' => 'dev', 'version' => 'v1'])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Update labels
        $created->metadata->labels = ['env' => 'prod', 'version' => 'v2', 'app' => 'myapp'];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertSame('prod', $updated->metadata?->labels['env'] ?? null);
        $this->assertSame('v2', $updated->metadata?->labels['version'] ?? null);
        $this->assertSame('myapp', $updated->metadata?->labels['app'] ?? null);
    }

    public function testUpdateAddBinaryData(): void
    {
        // Create a ConfigMap without binary data
        $name = $this->generateTestResourceName('cm-update-addbinary');
        $configMap = new ConfigMap(
            data: ['text-key' => 'text-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Add binary data
        $created->binaryData = ['binary-key' => base64_encode('binary content')];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertArrayHasKey('binary-key', $updated->binaryData ?? []);
    }

    public function testUpdateWithInvalidResourceVersionFails(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-conflict');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Try to update with an invalid resourceVersion
        $created->metadata->resourceVersion = '99999999';

        $this->expectException(\Throwable::class);
        $this->api->replace($name, $this->namespace, $created)->getContent();
    }

    public function testUpdateWithDryRun(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-dryrun');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Update with dryRun
        $created->data = ['key1' => 'updated-value1'];

        $response = $this->api->replace(
            name: $name,
            namespace: $this->namespace,
            body: $created,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        // Verify the ConfigMap was NOT actually updated
        $readResponse = $this->api->read($name, $this->namespace);
        $read = $readResponse->getContent();
        $this->assertSame(['key1' => 'value1'], $read->data, 'Data should not be updated after dryRun');
    }

    public function testUpdateWithFieldManager(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-fieldmgr');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Update with fieldManager
        $created->data = ['test-key' => 'updated-value'];

        $response = $this->api->replace(
            name: $name,
            namespace: $this->namespace,
            body: $created,
            queryParameters: ['fieldManager' => 'p8p-functional-test']
        );

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertSame(['test-key' => 'updated-value'], $updated->data);
    }

    public function testUpdateRemoveKeys(): void
    {
        // Create a ConfigMap with multiple keys
        $name = $this->generateTestResourceName('cm-update-remove');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Remove some keys
        $created->data = ['key1' => 'value1'];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertSame(['key1' => 'value1'], $updated->data);
        $this->assertArrayNotHasKey('key2', $updated->data ?? []);
    }

    public function testUpdateMultipleTimes(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-update-multiple');
        $configMap = new ConfigMap(
            data: ['counter' => '0'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $current = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        $initialResourceVersion = $current->metadata?->resourceVersion;

        // Update multiple times
        for ($i = 1; $i <= 3; ++$i) {
            $current->data = ['counter' => (string) $i];
            $response = $this->api->replace($name, $this->namespace, $current);
            $this->assertTrue($response->isSuccessful());
            $current = $response->getContent();
        }

        // Verify final state
        $this->assertSame(['counter' => '3'], $current->data);
        $this->assertNotSame($initialResourceVersion, $current->metadata?->resourceVersion);
    }

    public function testUpdateEmptyData(): void
    {
        // Create a ConfigMap with data
        $name = $this->generateTestResourceName('cm-update-emptydata');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();
        $this->createdConfigMaps[] = $name;

        // Update to remove all data
        $created->data = null;

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $updated);
        $this->assertNull($updated->data);
    }
}
