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

/**
 * Tests the Create operation against a real Kubernetes cluster.
 */
class CreateOperationTest extends AbstractFunctional
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

    public function testCreateSimpleConfigMap(): void
    {
        $name = $this->generateTestResourceName('cm-create-simple');

        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2'],
            metadata: $this->createMetadata($name)
        );

        $response = $this->api->create($this->namespace, $configMap);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertSame($name, $created->metadata?->name);
        $this->assertSame($this->namespace, $created->metadata?->namespace);
        $this->assertSame(['key1' => 'value1', 'key2' => 'value2'], $created->data);
        $this->assertNotNull($created->metadata?->uid);
        $this->assertNotNull($created->metadata?->resourceVersion);
    }

    public function testCreateConfigMapWithLabels(): void
    {
        $name = $this->generateTestResourceName('cm-create-labels');

        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, [
                'app' => 'test-app',
                'env' => 'production',
                'version' => 'v1.0.0',
            ])
        );

        $response = $this->api->create($this->namespace, $configMap);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertArrayHasKey('app', $created->metadata?->labels ?? []);
        $this->assertSame('test-app', $created->metadata?->labels['app']);
        $this->assertSame('production', $created->metadata?->labels['env']);
        $this->assertSame('v1.0.0', $created->metadata?->labels['version']);
    }

    public function testCreateConfigMapWithBinaryData(): void
    {
        $name = $this->generateTestResourceName('cm-create-binary');

        $configMap = new ConfigMap(
            data: ['text-key' => 'text-value'],
            binaryData: ['binary-key' => base64_encode('binary content')],
            metadata: $this->createMetadata($name)
        );

        $response = $this->api->create($this->namespace, $configMap);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertSame(['text-key' => 'text-value'], $created->data);
        $this->assertArrayHasKey('binary-key', $created->binaryData ?? []);
    }

    public function testCreateImmutableConfigMap(): void
    {
        $name = $this->generateTestResourceName('cm-create-immutable');

        $configMap = new ConfigMap(
            data: ['immutable-key' => 'immutable-value'],
            immutable: true,
            metadata: $this->createMetadata($name)
        );

        $response = $this->api->create($this->namespace, $configMap);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertTrue($created->immutable);
    }

    public function testCreateWithDryRun(): void
    {
        $name = $this->generateTestResourceName('cm-create-dryrun');

        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        // Create with dryRun
        $response = $this->api->create(
            namespace: $this->namespace,
            body: $configMap,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);

        // Verify the ConfigMap was NOT actually created
        $listResponse = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['fieldSelector' => "metadata.name=$name"]
        );

        $list = $listResponse->getContent();
        $this->assertEmpty($list->items, 'ConfigMap should not exist after dryRun');
    }

    public function testCreateDuplicateConfigMapFails(): void
    {
        $name = $this->generateTestResourceName('cm-create-duplicate');

        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        // Create first ConfigMap
        $response1 = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($response1->isSuccessful());

        // Try to create duplicate
        $this->expectException(\Throwable::class);
        $this->api->create($this->namespace, $configMap)->getContent();
    }

    public function testCreateWithFieldManager(): void
    {
        $name = $this->generateTestResourceName('cm-create-fieldmgr');

        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $response = $this->api->create(
            namespace: $this->namespace,
            body: $configMap,
            queryParameters: ['fieldManager' => 'p8p-functional-test']
        );

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertNotNull($created->metadata?->managedFields);
    }

    public function testCreateEmptyConfigMap(): void
    {
        $name = $this->generateTestResourceName('cm-create-empty');

        // ConfigMap with no data
        $configMap = new ConfigMap(
            metadata: $this->createMetadata($name)
        );

        $response = $this->api->create($this->namespace, $configMap);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $created);
        $this->assertSame($name, $created->metadata?->name);
        $this->assertNull($created->data);
    }
}
