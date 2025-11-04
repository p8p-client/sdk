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
 * Tests the Read operation against a real Kubernetes cluster.
 */
class ReadOperationTest extends AbstractFunctional
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

    public function testReadExistingConfigMap(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-read-existing');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2'],
            metadata: $this->createMetadata($name, ['env' => 'test'])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertSame($name, $read->metadata?->name);
        $this->assertSame($this->namespace, $read->metadata?->namespace);
        $this->assertSame(['key1' => 'value1', 'key2' => 'value2'], $read->data);
        $this->assertSame('test', $read->metadata?->labels['env'] ?? null);
        $this->assertNotNull($read->metadata?->uid);
        $this->assertNotNull($read->metadata?->resourceVersion);
        $this->assertNotNull($read->metadata?->creationTimestamp);
    }

    public function testReadNonExistentConfigMap(): void
    {
        $name = 'non-existent-configmap-'.uniqid();

        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }

    public function testReadConfigMapWithBinaryData(): void
    {
        // Create a ConfigMap with binary data
        $name = $this->generateTestResourceName('cm-read-binary');
        $binaryContent = base64_encode('binary content here');

        $configMap = new ConfigMap(
            data: ['text-key' => 'text-value'],
            binaryData: ['binary-key' => $binaryContent],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertSame(['text-key' => 'text-value'], $read->data);
        $this->assertArrayHasKey('binary-key', $read->binaryData ?? []);
        $this->assertSame($binaryContent, $read->binaryData['binary-key']);
    }

    public function testReadImmutableConfigMap(): void
    {
        // Create an immutable ConfigMap
        $name = $this->generateTestResourceName('cm-read-immutable');
        $configMap = new ConfigMap(
            data: ['immutable-key' => 'immutable-value'],
            immutable: true,
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertTrue($read->immutable);
    }

    public function testReadWithPrettyParameter(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-read-pretty');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read with pretty parameter
        $response = $this->api->read(
            name: $name,
            namespace: $this->namespace,
            queryParameters: ['pretty' => 'true']
        );

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertSame($name, $read->metadata?->name);
    }

    public function testReadConfigMapWithMultipleLabels(): void
    {
        // Create a ConfigMap with multiple labels
        $name = $this->generateTestResourceName('cm-read-labels');
        $labels = [
            'app' => 'test-app',
            'env' => 'production',
            'version' => 'v1.0.0',
            'component' => 'backend',
        ];

        $configMap = new ConfigMap(
            data: ['config-key' => 'config-value'],
            metadata: $this->createMetadata($name, $labels)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertArrayHasKey('app', $read->metadata?->labels ?? []);
        $this->assertSame('test-app', $read->metadata?->labels['app']);
        $this->assertSame('production', $read->metadata?->labels['env']);
        $this->assertSame('v1.0.0', $read->metadata?->labels['version']);
        $this->assertSame('backend', $read->metadata?->labels['component']);
    }

    public function testReadEmptyConfigMap(): void
    {
        // Create an empty ConfigMap
        $name = $this->generateTestResourceName('cm-read-empty');
        $configMap = new ConfigMap(
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertSame($name, $read->metadata?->name);
        $this->assertNull($read->data);
    }

    public function testReadVerifyResourceVersion(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-read-version');
        $configMap = new ConfigMap(
            data: ['version-key' => 'version-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Read the ConfigMap
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $read);
        $this->assertNotNull($read->metadata?->resourceVersion);
        $this->assertSame($created->metadata?->resourceVersion, $read->metadata?->resourceVersion);
    }
}
