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

use P8p\Sdk\Api\RbacAuthorization\V1\RoleApi;
use P8p\Sdk\Schema\RbacAuthorization\V1\PolicyRule;
use P8p\Sdk\Schema\RbacAuthorization\V1\Role;

/**
 * Tests the List operation against a real Kubernetes cluster using a Grouped API.
 */
class ListOperationGroupedApiTest extends AbstractFunctional
{
    private RoleApi $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(RoleApi::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupResources(RoleApi::class);
        parent::tearDown();
    }

    public function testListRolesInNamespace(): void
    {
        // Create test Roles
        $role1 = $this->createTestRole(['app' => 'test-list', 'version' => 'v1']);
        $role2 = $this->createTestRole(['app' => 'test-list', 'version' => 'v2']);

        // List all Roles in namespace
        $response = $this->api->list($this->namespace);

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);
        $this->assertNotEmpty($roleList->items);

        // Verify our created Roles are in the list
        $names = array_map(fn ($role) => $role->metadata?->name, $roleList->items);
        $this->assertContains($role1->metadata?->name, $names);
        $this->assertContains($role2->metadata?->name, $names);
    }

    public function testListWithLabelSelector(): void
    {
        // Create Roles with different labels
        $role1 = $this->createTestRole(['app' => 'test-selector', 'env' => 'dev']);
        $role2 = $this->createTestRole(['app' => 'test-selector', 'env' => 'prod']);
        $role3 = $this->createTestRole(['app' => 'other', 'env' => 'dev']);

        // List with label selector
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'app=test-selector']
        );

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);

        // Should contain only Roles with app=test-selector
        $names = array_map(fn ($role) => $role->metadata?->name, $roleList->items);
        $this->assertContains($role1->metadata?->name, $names);
        $this->assertContains($role2->metadata?->name, $names);
        $this->assertNotContains($role3->metadata?->name, $names);
    }

    public function testListWithMultipleLabelSelectors(): void
    {
        // Create Roles with different labels
        $role1 = $this->createTestRole(['app' => 'test-multi', 'env' => 'staging']);
        $role2 = $this->createTestRole(['app' => 'test-multi', 'env' => 'prod']);

        // List with multiple label selectors
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'app=test-multi,env=staging']
        );

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);

        // Should contain only Roles matching both labels
        $names = array_map(fn ($role) => $role->metadata?->name, $roleList->items);
        $this->assertContains($role1->metadata?->name, $names);
        $this->assertNotContains($role2->metadata?->name, $names);
    }

    public function testListWithLimit(): void
    {
        // Create multiple Roles
        $this->createTestRole(['app' => 'test-limit']);
        $this->createTestRole(['app' => 'test-limit']);
        $this->createTestRole(['app' => 'test-limit']);

        // List with limit
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: [
                'labelSelector' => 'app=test-limit',
                'limit' => 2,
            ]
        );

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);
        $this->assertCount(2, $roleList->items);

        // Should have continue token for pagination
        $this->assertNotNull($roleList->metadata?->continue);
    }

    public function testListForAllNamespaces(): void
    {
        // Create a test Role in the default namespace
        $role = $this->createTestRole(['app' => 'test-all-namespaces']);

        // List across all namespaces
        $response = $this->api->listForAllNamespaces([
            'labelSelector' => 'app=test-all-namespaces',
        ]);

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);
        $this->assertNotEmpty($roleList->items);

        // Verify our created Role is in the list
        $names = array_map(fn ($role) => $role->metadata?->name, $roleList->items);
        $this->assertContains($role->metadata?->name, $names);
    }

    public function testListEmptyResult(): void
    {
        // List with a label selector that doesn't match anything
        $response = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['labelSelector' => 'non-existent-label=non-existent-value']
        );

        $this->assertTrue($response->isSuccessful());

        $roleList = $response->getContent();
        $this->assertInstanceOf(\P8p\Sdk\Schema\RbacAuthorization\V1\RoleList::class, $roleList);
        $this->assertEmpty($roleList->items);
    }

    /**
     * Creates a test Role with the given labels.
     *
     * @param array<string, string> $labels
     */
    private function createTestRole(array $labels): Role
    {
        $name = $this->generateTestResourceName('role-list-test');

        // Create a simple Role with read-only access to pods
        $role = new Role(
            metadata: $this->createMetadata($name, array_merge(['test' => 'p8p-functional'], $labels)),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);
        $this->assertTrue($response->isSuccessful(), 'Failed to create test Role: '.$name);

        $created = $response->getContent();

        return $created;
    }
}
