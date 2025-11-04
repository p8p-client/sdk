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
use P8p\Sdk\Schema\Rbac\V1\PolicyRule;
use P8p\Sdk\Schema\Rbac\V1\Role;

/**
 * Tests the Replace operation against a real Kubernetes cluster using a Grouped API.
 */
class ReplaceOperationGroupedApiTest extends AbstractFunctional
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

    public function testUpdateRoleRules(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-rules');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Update the rules
        $created->rules = [
            new PolicyRule(
                verbs: ['get', 'list', 'watch'],
                apiGroups: [''],
                resources: ['pods', 'services']
            ),
        ];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertCount(1, $updated->rules ?? []);
        $this->assertSame(['get', 'list', 'watch'], $updated->rules[0]->verbs);
        $this->assertSame(['pods', 'services'], $updated->rules[0]->resources);
        $this->assertNotSame($created->metadata?->resourceVersion, $updated->metadata?->resourceVersion);
    }

    public function testUpdateRoleLabels(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-labels');
        $role = new Role(
            metadata: $this->createMetadata($name, ['env' => 'dev', 'team' => 'backend']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['configmaps']
                ),
            ]
        );

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Update labels (merge to preserve p8p-test label)
        $created->metadata->labels = array_merge(
            $created->metadata->labels ?? [],
            ['env' => 'prod', 'team' => 'platform', 'rbac-type' => 'read-only']
        );

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertSame('prod', $updated->metadata?->labels['env'] ?? null);
        $this->assertSame('platform', $updated->metadata?->labels['team'] ?? null);
        $this->assertSame('read-only', $updated->metadata?->labels['rbac-type'] ?? null);
    }

    public function testUpdateAddRules(): void
    {
        // Create a Role with one rule
        $name = $this->generateTestResourceName('role-update-addrules');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Add more rules
        $created->rules = [
            new PolicyRule(
                verbs: ['get'],
                apiGroups: [''],
                resources: ['pods']
            ),
            new PolicyRule(
                verbs: ['get', 'list'],
                apiGroups: [''],
                resources: ['services']
            ),
            new PolicyRule(
                verbs: ['get', 'list'],
                apiGroups: ['apps'],
                resources: ['deployments']
            ),
        ];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertCount(3, $updated->rules ?? []);
    }

    public function testUpdateWithInvalidResourceVersionFails(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-conflict');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Try to update with an invalid resourceVersion
        $created->metadata->resourceVersion = '99999999';

        $this->expectException(\Throwable::class);
        $this->api->replace($name, $this->namespace, $created)->getContent();
    }

    public function testUpdateWithDryRun(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-dryrun');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Update with dryRun
        $created->rules = [
            new PolicyRule(
                verbs: ['get', 'list', 'watch'],
                apiGroups: [''],
                resources: ['pods', 'services']
            ),
        ];

        $response = $this->api->replace(
            name: $name,
            namespace: $this->namespace,
            body: $created,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        // Verify the Role was NOT actually updated
        $readResponse = $this->api->read($name, $this->namespace);
        $read = $readResponse->getContent();
        $this->assertCount(1, $read->rules ?? []);
        $this->assertSame(['get'], $read->rules[0]->verbs, 'Rules should not be updated after dryRun');
    }

    public function testUpdateWithFieldManager(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-fieldmgr');
        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['configmaps']
                ),
            ]
        );

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Update with fieldManager
        $created->rules = [
            new PolicyRule(
                verbs: ['get', 'list'],
                apiGroups: [''],
                resources: ['configmaps', 'secrets']
            ),
        ];

        $response = $this->api->replace(
            name: $name,
            namespace: $this->namespace,
            body: $created,
            queryParameters: ['fieldManager' => 'p8p-functional-test']
        );

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertSame(['get', 'list'], $updated->rules[0]->verbs);
    }

    public function testUpdateRemoveRules(): void
    {
        // Create a Role with multiple rules
        $name = $this->generateTestResourceName('role-update-removerules');
        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['services']
                ),
            ]
        );

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Remove one rule
        $created->rules = [
            new PolicyRule(
                verbs: ['get', 'list'],
                apiGroups: [''],
                resources: ['pods']
            ),
        ];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertCount(1, $updated->rules ?? []);
    }

    public function testUpdateMultipleTimes(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-multiple');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $current = $createResponse->getContent();

        $initialResourceVersion = $current->metadata?->resourceVersion;

        // Update multiple times
        $resources = [
            ['pods', 'services'],
            ['pods', 'services', 'configmaps'],
            ['pods', 'services', 'configmaps', 'secrets'],
        ];

        foreach ($resources as $resourceList) {
            $current->rules = [
                new PolicyRule(
                    verbs: ['get', 'list'],
                    apiGroups: [''],
                    resources: $resourceList
                ),
            ];
            $response = $this->api->replace($name, $this->namespace, $current);
            $this->assertTrue($response->isSuccessful());
            $current = $response->getContent();
        }

        // Verify final state
        $this->assertSame(['pods', 'services', 'configmaps', 'secrets'], $current->rules[0]->resources);
        $this->assertNotSame($initialResourceVersion, $current->metadata?->resourceVersion);
    }

    public function testUpdateRuleWithResourceNames(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-update-resnames');
        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['secrets']
                ),
            ]
        );

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $created = $createResponse->getContent();

        // Update to add resourceNames
        $created->rules = [
            new PolicyRule(
                verbs: ['get'],
                apiGroups: [''],
                resourceNames: ['secret1', 'secret2', 'secret3'],
                resources: ['secrets']
            ),
        ];

        $response = $this->api->replace($name, $this->namespace, $created);

        $this->assertTrue($response->isSuccessful());

        $updated = $response->getContent();
        $this->assertInstanceOf(Role::class, $updated);
        $this->assertSame(['secret1', 'secret2', 'secret3'], $updated->rules[0]->resourceNames);
    }
}
