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
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Rbac\V1\PolicyRule;
use P8p\Sdk\Schema\Rbac\V1\Role;

/**
 * Tests the Create operation against a real Kubernetes cluster using a Grouped API.
 */
class CreateOperationGroupedApiTest extends AbstractFunctional
{
    private RoleApi $api;
    /** @var array<string> */
    private array $createdRoles = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->client->getApi(RoleApi::class);
    }

    protected function tearDown(): void
    {
        // Clean up all created Roles
        foreach ($this->createdRoles as $name) {
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

    public function testCreateSimpleRole(): void
    {
        $name = $this->generateTestResourceName('role-create-simple');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertSame($name, $created->metadata?->name);
        $this->assertSame($this->namespace, $created->metadata?->namespace);
        $this->assertNotNull($created->metadata?->uid);
        $this->assertNotNull($created->metadata?->resourceVersion);
        $this->assertCount(1, $created->rules ?? []);

        $this->createdRoles[] = $name;
    }

    public function testCreateRoleWithMultipleRules(): void
    {
        $name = $this->generateTestResourceName('role-create-multi');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list', 'watch'],
                    apiGroups: [''],
                    resources: ['pods', 'services']
                ),
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: ['apps'],
                    resources: ['deployments']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertCount(2, $created->rules ?? []);

        $this->createdRoles[] = $name;
    }

    public function testCreateRoleWithLabels(): void
    {
        $name = $this->generateTestResourceName('role-create-labels');

        $role = new Role(
            metadata: $this->createMetadata($name, [
                'app' => 'test-app',
                'env' => 'production',
                'rbac-type' => 'read-only',
            ]),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: ['configmaps']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertArrayHasKey('app', $created->metadata?->labels ?? []);
        $this->assertSame('test-app', $created->metadata?->labels['app']);
        $this->assertSame('production', $created->metadata?->labels['env']);
        $this->assertSame('read-only', $created->metadata?->labels['rbac-type']);

        $this->createdRoles[] = $name;
    }

    public function testCreateRoleWithResourceNames(): void
    {
        $name = $this->generateTestResourceName('role-create-resnames');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resourceNames: ['my-secret', 'another-secret'],
                    resources: ['secrets']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertNotEmpty($created->rules);
        $this->assertSame(['my-secret', 'another-secret'], $created->rules[0]->resourceNames);

        $this->createdRoles[] = $name;
    }

    public function testCreateWithDryRun(): void
    {
        $name = $this->generateTestResourceName('role-create-dryrun');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        // Create with dryRun
        $response = $this->api->create(
            namespace: $this->namespace,
            body: $role,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);

        // Verify the Role was NOT actually created
        $listResponse = $this->api->list(
            namespace: $this->namespace,
            queryParameters: ['fieldSelector' => "metadata.name=$name"]
        );

        $list = $listResponse->getContent();
        $this->assertEmpty($list->items, 'Role should not exist after dryRun');
    }

    public function testCreateDuplicateRoleFails(): void
    {
        $name = $this->generateTestResourceName('role-create-duplicate');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        // Create first Role
        $response1 = $this->api->create($this->namespace, $role);
        $this->assertTrue($response1->isSuccessful());
        $this->createdRoles[] = $name;

        // Try to create duplicate
        $this->expectException(\Throwable::class);
        $this->api->create($this->namespace, $role)->getContent();
    }

    public function testCreateWithFieldManager(): void
    {
        $name = $this->generateTestResourceName('role-create-fieldmgr');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: ['services']
                ),
            ]
        );

        $response = $this->api->create(
            namespace: $this->namespace,
            body: $role,
            queryParameters: ['fieldManager' => 'p8p-functional-test']
        );

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertNotNull($created->metadata?->managedFields);

        $this->createdRoles[] = $name;
    }

    public function testCreateRoleWithWildcardVerbs(): void
    {
        $name = $this->generateTestResourceName('role-create-wildcard');

        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['*'],
                    apiGroups: [''],
                    resources: ['configmaps']
                ),
            ]
        );

        $response = $this->api->create($this->namespace, $role);

        $this->assertTrue($response->isSuccessful());

        $created = $response->getContent();
        $this->assertInstanceOf(Role::class, $created);
        $this->assertSame(['*'], $created->rules[0]->verbs);

        $this->createdRoles[] = $name;
    }
}
