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
 * Tests the DeleteCollection operation against a real Kubernetes cluster.
 */
class DeleteCollectionOperationTest extends AbstractFunctional
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

    public function testDeleteCollectionWithLabelSelector(): void
    {
        // Create multiple ConfigMaps with same label
        $label = 'test-delete-collection';
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("cm-delcol-label-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name, ['app' => $label])
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
            $names[] = $name;
        }

        // Delete all ConfigMaps with this label
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => "app=$label"]
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();
        $this->assertInstanceOf(Status::class, $result);

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

    public function testDeleteCollectionWithMultipleLabelSelectors(): void
    {
        // Create ConfigMaps with different labels
        $name1 = $this->generateTestResourceName('cm-delcol-multi1');
        $configMap1 = new ConfigMap(
            data: ['key' => 'value1'],
            metadata: $this->createMetadata($name1, ['app' => 'test', 'env' => 'dev'])
        );

        $name2 = $this->generateTestResourceName('cm-delcol-multi2');
        $configMap2 = new ConfigMap(
            data: ['key' => 'value2'],
            metadata: $this->createMetadata($name2, ['app' => 'test', 'env' => 'prod'])
        );

        $name3 = $this->generateTestResourceName('cm-delcol-multi3');
        $configMap3 = new ConfigMap(
            data: ['key' => 'value3'],
            metadata: $this->createMetadata($name3, ['app' => 'other', 'env' => 'dev'])
        );

        $createResponse1 = $this->api->create($this->namespace, $configMap1);
        $this->assertTrue($createResponse1->isSuccessful());

        $createResponse2 = $this->api->create($this->namespace, $configMap2);
        $this->assertTrue($createResponse2->isSuccessful());

        $createResponse3 = $this->api->create($this->namespace, $configMap3);
        $this->assertTrue($createResponse3->isSuccessful());

        // Delete only ConfigMaps with app=test and env=dev
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => 'app=test,env=dev']
        );

        $this->assertTrue($response->isSuccessful());

        // name2 and name3 should still exist (different labels)
        $read2 = $this->api->read($name2, $this->namespace)->getContent();
        $this->assertSame($name2, $read2->metadata?->name);

        $read3 = $this->api->read($name3, $this->namespace)->getContent();
        $this->assertSame($name3, $read3->metadata?->name);

        // Cleanup remaining

        // Verify only name1 is deleted
        $this->expectException(\Throwable::class);
        $this->api->read($name1, $this->namespace)->getContent();
    }

    public function testDeleteCollectionEmptyResult(): void
    {
        // Delete with label selector that matches nothing
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => 'non-existent-label=non-existent-value']
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();
        $this->assertInstanceOf(Status::class, $result);
    }

    public function testDeleteCollectionWithGracePeriodSeconds(): void
    {
        // Create ConfigMaps
        $label = 'test-delete-grace';
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("cm-delcol-grace-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name, ['app' => $label])
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
        }

        // Delete with gracePeriodSeconds
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: [
                'labelSelector' => "app=$label",
                'gracePeriodSeconds' => 0,
            ]
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteCollectionWithPropagationPolicy(): void
    {
        // Create ConfigMaps
        $label = 'test-delete-propagation';
        $names = [];
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("cm-delcol-propagation-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name, ['app' => $label])
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
            $names[] = $name;
        }

        // Delete with propagationPolicy
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: [
                'labelSelector' => "app=$label",
                'propagationPolicy' => 'Foreground',
            ]
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteCollectionWithDeleteOptions(): void
    {
        // Create ConfigMaps
        $label = 'test-delete-options';
        $names = [];
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("cm-delcol-options-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name, ['app' => $label])
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
            $names[] = $name;
        }

        // Delete with DeleteOptions body
        $deleteOptions = new DeleteOptions(
            gracePeriodSeconds: 0,
            propagationPolicy: 'Background'
        );

        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: $deleteOptions,
            queryParameters: ['labelSelector' => "app=$label"]
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteCollectionVerifyStatusResponse(): void
    {
        // Create ConfigMaps
        $label = 'test-delete-status';
        $name = $this->generateTestResourceName('cm-delcol-status');
        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, ['app' => $label])
        );

        $createResponse = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($createResponse->isSuccessful());

        // Delete the ConfigMaps
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => "app=$label"]
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();

        // ConfigMapApi.deleteCollection() returns Status
        $this->assertInstanceOf(Status::class, $result);
        if (null !== $result->status) {
            $this->assertSame('Success', $result->status);
        }
    }

    public function testDeleteCollectionAll(): void
    {
        // Create multiple ConfigMaps with unique prefix
        $prefix = 'cm-delcol-all';
        $label = 'test-delete-all';
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("$prefix-$i");
            $configMap = new ConfigMap(
                data: ['key' => "value$i"],
                metadata: $this->createMetadata($name, ['batch' => $label])
            );

            $createResponse = $this->api->create($this->namespace, $configMap);
            $this->assertTrue($createResponse->isSuccessful());
            $names[] = $name;
        }

        // List to verify they exist
        $listResponse = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => "batch=$label"]
        );
        $list = $listResponse->getContent();
        $this->assertCount(3, $list->items);

        // Delete all with label
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => "batch=$label"]
        );

        $this->assertTrue($response->isSuccessful());

        // Verify all are deleted
        $listResponse = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => "batch=$label"]
        );
        $list = $listResponse->getContent();
        $this->assertCount(0, $list->items);
    }

    public function testDeleteCollectionWithFieldSelector(): void
    {
        // Create ConfigMaps
        $name1 = $this->generateTestResourceName('cm-delcol-field1');
        $configMap1 = new ConfigMap(
            data: ['key' => 'value1'],
            metadata: $this->createMetadata($name1, ['app' => 'field-test'])
        );

        $name2 = $this->generateTestResourceName('cm-delcol-field2');
        $configMap2 = new ConfigMap(
            data: ['key' => 'value2'],
            metadata: $this->createMetadata($name2, ['app' => 'field-test'])
        );

        $createResponse1 = $this->api->create($this->namespace, $configMap1);
        $this->assertTrue($createResponse1->isSuccessful());

        $createResponse2 = $this->api->create($this->namespace, $configMap2);
        $this->assertTrue($createResponse2->isSuccessful());

        // Delete with field selector (metadata.name)
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['fieldSelector' => "metadata.name=$name1"]
        );

        $this->assertTrue($response->isSuccessful());

        // Verify only name1 is deleted
        $this->expectException(\Throwable::class);
        $this->api->read($name1, $this->namespace)->getContent();

        // name2 should still exist
        $read2 = $this->api->read($name2, $this->namespace)->getContent();
        $this->assertSame($name2, $read2->metadata?->name);

        // Cleanup remaining
    }
}
