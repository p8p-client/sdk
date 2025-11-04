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
 * Tests the List operation against a real Kubernetes cluster.
 */
class ListOperationTest extends AbstractFunctional
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

    public function testListConfigMapsInNamespace(): void
    {
        // Create test ConfigMaps
        $configMap1 = $this->createTestConfigMap(['app' => 'test-list', 'version' => 'v1']);
        $configMap2 = $this->createTestConfigMap(['app' => 'test-list', 'version' => 'v2']);

        // List all ConfigMaps in namespace
        $response = $this->api->list($this->namespace);

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);
        $this->assertNotEmpty($configMapList->items);

        // Verify our created ConfigMaps are in the list
        $names = array_map(fn ($cm) => $cm->metadata?->name, $configMapList->items);
        $this->assertContains($configMap1->metadata?->name, $names);
        $this->assertContains($configMap2->metadata?->name, $names);
    }

    public function testListWithLabelSelector(): void
    {
        // Create ConfigMaps with different labels
        $configMap1 = $this->createTestConfigMap(['app' => 'test-selector', 'env' => 'dev']);
        $configMap2 = $this->createTestConfigMap(['app' => 'test-selector', 'env' => 'prod']);
        $configMap3 = $this->createTestConfigMap(['app' => 'other', 'env' => 'dev']);

        // List with label selector
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'app=test-selector']
        );

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);

        // Should contain only ConfigMaps with app=test-selector
        $names = array_map(fn ($cm) => $cm->metadata?->name, $configMapList->items);
        $this->assertContains($configMap1->metadata?->name, $names);
        $this->assertContains($configMap2->metadata?->name, $names);
        $this->assertNotContains($configMap3->metadata?->name, $names);
    }

    public function testListWithMultipleLabelSelectors(): void
    {
        // Create ConfigMaps with different labels
        $configMap1 = $this->createTestConfigMap(['app' => 'test-multi', 'env' => 'staging']);
        $configMap2 = $this->createTestConfigMap(['app' => 'test-multi', 'env' => 'prod']);

        // List with multiple label selectors
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'app=test-multi,env=staging']
        );

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);

        // Should contain only ConfigMaps matching both labels
        $names = array_map(fn ($cm) => $cm->metadata?->name, $configMapList->items);
        $this->assertContains($configMap1->metadata?->name, $names);
        $this->assertNotContains($configMap2->metadata?->name, $names);
    }

    public function testListWithLimit(): void
    {
        // Create multiple ConfigMaps
        $this->createTestConfigMap(['app' => 'test-limit']);
        $this->createTestConfigMap(['app' => 'test-limit']);
        $this->createTestConfigMap(['app' => 'test-limit']);

        // List with limit
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: [
                'labelSelector' => 'app=test-limit',
                'limit' => 2,
            ]
        );

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);
        $this->assertCount(2, $configMapList->items);

        // Should have continue token for pagination
        $this->assertNotNull($configMapList->metadata?->continue);
    }

    public function testListForAllNamespaces(): void
    {
        // Create a test ConfigMap in the default namespace
        $configMap = $this->createTestConfigMap(['app' => 'test-all-namespaces']);

        // List across all namespaces
        $response = $this->api->listForAllNamespaces([
            'labelSelector' => 'app=test-all-namespaces',
        ]);

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);
        $this->assertNotEmpty($configMapList->items);

        // Verify our created ConfigMap is in the list
        $names = array_map(fn ($cm) => $cm->metadata?->name, $configMapList->items);
        $this->assertContains($configMap->metadata?->name, $names);
    }

    public function testListEmptyResult(): void
    {
        // List with a label selector that doesn't match anything
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'non-existent-label=non-existent-value']
        );

        $this->assertTrue($response->isSuccessful());

        $configMapList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\Core\V1\ConfigMapList::class, $configMapList);
        $this->assertEmpty($configMapList->items);
    }

    /**
     * Creates a test ConfigMap with the given labels.
     *
     * @param array<string, string> $labels
     */
    private function createTestConfigMap(array $labels): ConfigMap
    {
        $name = $this->generateTestResourceName('cm-list-test');

        $configMap = new ConfigMap(
            data: ['test-key' => 'test-value'],
            metadata: $this->createMetadata($name, array_merge(['test' => 'p8p-functional'], $labels))
        );

        $response = $this->api->create($this->namespace, $configMap);
        $this->assertTrue($response->isSuccessful(), 'Failed to create test ConfigMap: '.$name);

        $created = $response->getContent();

        return $created;
    }
}
