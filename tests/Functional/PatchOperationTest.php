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
 * Tests the Patch operation against a real Kubernetes cluster.
 */
class PatchOperationTest extends AbstractFunctional
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

    public function testPatchConfigMapData(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-data');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch only key1
        $patch = [
            'data' => [
                'key1' => 'patched-value1',
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertSame('patched-value1', $patched->data['key1']);
        $this->assertSame('value2', $patched->data['key2'], 'key2 should remain unchanged');
    }

    public function testPatchAddNewKey(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-addkey');
        $configMap = new ConfigMap(
            data: ['existing-key' => 'existing-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch to add a new key
        $patch = [
            'data' => [
                'new-key' => 'new-value',
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertArrayHasKey('existing-key', $patched->data);
        $this->assertArrayHasKey('new-key', $patched->data);
        $this->assertSame('new-value', $patched->data['new-key']);
    }

    public function testPatchLabels(): void
    {
        // Create a ConfigMap with initial labels
        $name = $this->generateTestResourceName('cm-patch-labels');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, ['env' => 'dev', 'version' => 'v1'])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch to add/modify labels
        $patch = [
            'metadata' => [
                'labels' => [
                    'env' => 'prod',
                    'app' => 'myapp',
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertSame('prod', $patched->metadata?->labels['env']);
        $this->assertSame('myapp', $patched->metadata?->labels['app']);
        $this->assertArrayHasKey('version', $patched->metadata?->labels ?? []);
    }

    public function testPatchRemoveDataKey(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-remove');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch to remove key2 (set to null)
        $patch = [
            'data' => [
                'key2' => null,
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertArrayHasKey('key1', $patched->data);
        $this->assertArrayNotHasKey('key2', $patched->data ?? []);
        $this->assertArrayHasKey('key3', $patched->data);
    }

    public function testPatchNonExistentConfigMapFails(): void
    {
        $name = $this->generateTestResourceName('cm-patch-nonexistent');

        $patch = [
            'data' => [
                'test-key' => 'test-value',
            ],
        ];

        $this->expectException(\Throwable::class);
        $this->api->patch($name, $this->namespace, $patch)->getContent();
    }

    public function testPatchWithDryRun(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-dryrun');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch with dryRun
        $patch = [
            'data' => [
                'key1' => 'patched-value1',
            ],
        ];

        $response = $this->api->patch(
            name: $name,
            namespace: $this->namespace,
            body: $patch,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        // Verify the ConfigMap was NOT actually patched
        $readResponse = $this->api->read($name, $this->namespace);
        $read = $readResponse->getContent();
        $this->assertSame(['key1' => 'value1'], $read->data, 'Data should not be patched after dryRun');
    }

    public function testPatchWithFieldManager(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-fieldmgr');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch with fieldManager
        $patch = [
            'data' => [
                'test-key' => 'patched-value',
            ],
        ];

        $response = $this->api->patch(
            name: $name,
            namespace: $this->namespace,
            body: $patch,
            queryParameters: ['fieldManager' => 'p8p-functional-test']
        );

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertSame(['test-key' => 'patched-value'], $patched->data);
    }

    public function testPatchMultipleFields(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-multiple');
        $configMap = new ConfigMap(
            data: ['key1' => 'value1'],
            metadata: $this->createMetadata($name, ['env' => 'dev'])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch both data and labels
        $patch = [
            'data' => [
                'key1' => 'updated-value1',
                'key2' => 'value2',
            ],
            'metadata' => [
                'labels' => [
                    'env' => 'prod',
                    'component' => 'backend',
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertSame('updated-value1', $patched->data['key1']);
        $this->assertSame('value2', $patched->data['key2']);
        $this->assertSame('prod', $patched->metadata?->labels['env']);
        $this->assertSame('backend', $patched->metadata?->labels['component']);
    }

    public function testPatchBinaryData(): void
    {
        // Create a ConfigMap
        $name = $this->generateTestResourceName('cm-patch-binary');
        $configMap = new ConfigMap(
            data: ['text-key' => 'text-value'],
            metadata: $this->createMetadata($name)
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdConfigMaps[] = $name;

        // Patch to add binary data
        $patch = [
            'binaryData' => [
                'binary-key' => base64_encode('binary content'),
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(ConfigMap::class, $patched);
        $this->assertArrayHasKey('text-key', $patched->data);
        $this->assertArrayHasKey('binary-key', $patched->binaryData ?? []);
    }
}
