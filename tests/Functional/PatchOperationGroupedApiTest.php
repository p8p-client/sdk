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
 * Tests the Patch operation against a real Kubernetes cluster using a Grouped API.
 */
class PatchOperationGroupedApiTest extends AbstractFunctional
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

    public function testPatchRoleRules(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-patch-rules');
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
        $this->createdRoles[] = $name;

        // Patch to modify rules
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get', 'list', 'watch'],
                    'apiGroups' => [''],
                    'resources' => ['pods', 'services'],
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertCount(1, $patched->rules ?? []);
        $this->assertSame(['get', 'list', 'watch'], $patched->rules[0]->verbs);
        $this->assertSame(['pods', 'services'], $patched->rules[0]->resources);
    }

    public function testPatchAddRule(): void
    {
        // Create a Role with one rule
        $name = $this->generateTestResourceName('role-patch-addrule');
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
        $this->createdRoles[] = $name;

        // Patch to add a new rule
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get'],
                    'apiGroups' => [''],
                    'resources' => ['pods'],
                ],
                [
                    'verbs' => ['get', 'list'],
                    'apiGroups' => [''],
                    'resources' => ['services'],
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertCount(2, $patched->rules ?? []);
    }

    public function testPatchLabels(): void
    {
        // Create a Role with initial labels
        $name = $this->generateTestResourceName('role-patch-labels');
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
        $this->createdRoles[] = $name;

        // Patch to add/modify labels
        $patch = [
            'metadata' => [
                'labels' => [
                    'env' => 'prod',
                    'rbac-type' => 'read-only',
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertSame('prod', $patched->metadata?->labels['env']);
        $this->assertSame('read-only', $patched->metadata?->labels['rbac-type']);
        $this->assertArrayHasKey('team', $patched->metadata?->labels ?? []);
    }

    public function testPatchAddResourceNames(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-patch-resnames');
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
        $this->createdRoles[] = $name;

        // Patch to add resourceNames
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get'],
                    'apiGroups' => [''],
                    'resources' => ['secrets'],
                    'resourceNames' => ['secret1', 'secret2'],
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertSame(['secret1', 'secret2'], $patched->rules[0]->resourceNames);
    }

    public function testPatchNonExistentRoleFails(): void
    {
        $name = $this->generateTestResourceName('role-patch-nonexistent');

        $patch = [
            'rules' => [
                [
                    'verbs' => ['get'],
                    'apiGroups' => [''],
                    'resources' => ['pods'],
                ],
            ],
        ];

        $this->expectException(\Throwable::class);
        $this->api->patch($name, $this->namespace, $patch)->getContent();
    }

    public function testPatchWithDryRun(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-patch-dryrun');
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
        $this->createdRoles[] = $name;

        // Patch with dryRun
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get', 'list', 'watch'],
                    'apiGroups' => [''],
                    'resources' => ['pods', 'services'],
                ],
            ],
        ];

        $response = $this->api->patch(
            name: $name,
            namespace: $this->namespace,
            body: $patch,
            queryParameters: ['dryRun' => 'All']
        );

        $this->assertTrue($response->isSuccessful());

        // Verify the Role was NOT actually patched
        $readResponse = $this->api->read($name, $this->namespace);
        $read = $readResponse->getContent();
        $this->assertCount(1, $read->rules ?? []);
        $this->assertSame(['get'], $read->rules[0]->verbs, 'Rules should not be patched after dryRun');
    }

    public function testPatchWithFieldManager(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-patch-fieldmgr');
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
        $this->createdRoles[] = $name;

        // Patch with fieldManager
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get', 'list'],
                    'apiGroups' => [''],
                    'resources' => ['configmaps', 'secrets'],
                ],
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
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertSame(['get', 'list'], $patched->rules[0]->verbs);
    }

    public function testPatchMultipleFields(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-patch-multiple');
        $role = new Role(
            metadata: $this->createMetadata($name, ['env' => 'dev']),
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
        $this->createdRoles[] = $name;

        // Patch both rules and labels
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get', 'list', 'watch'],
                    'apiGroups' => [''],
                    'resources' => ['pods', 'services'],
                ],
            ],
            'metadata' => [
                'labels' => [
                    'env' => 'prod',
                    'component' => 'rbac',
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertSame(['get', 'list', 'watch'], $patched->rules[0]->verbs);
        $this->assertSame('prod', $patched->metadata?->labels['env']);
        $this->assertSame('rbac', $patched->metadata?->labels['component']);
    }

    public function testPatchRemoveRule(): void
    {
        // Create a Role with multiple rules
        $name = $this->generateTestResourceName('role-patch-removerule');
        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
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
        $this->createdRoles[] = $name;

        // Patch to keep only one rule
        $patch = [
            'rules' => [
                [
                    'verbs' => ['get'],
                    'apiGroups' => [''],
                    'resources' => ['pods'],
                ],
            ],
        ];

        $response = $this->api->patch($name, $this->namespace, $patch);

        $this->assertTrue($response->isSuccessful());

        $patched = $response->getContent();
        $this->assertInstanceOf(Role::class, $patched);
        $this->assertCount(1, $patched->rules ?? []);
        $this->assertSame(['pods'], $patched->rules[0]->resources);
    }
}
