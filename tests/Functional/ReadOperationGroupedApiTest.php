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
 * Tests the Read operation against a real Kubernetes cluster using a Grouped API.
 */
class ReadOperationGroupedApiTest extends AbstractFunctional
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

    public function testReadExistingRole(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-read-existing');
        $role = new Role(
            metadata: $this->createMetadata($name, ['env' => 'test']),
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
        $this->createdRoles[] = $name;

        // Read the Role
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertSame($name, $read->metadata?->name);
        $this->assertSame($this->namespace, $read->metadata?->namespace);
        $this->assertSame('test', $read->metadata?->labels['env'] ?? null);
        $this->assertNotNull($read->metadata?->uid);
        $this->assertNotNull($read->metadata?->resourceVersion);
        $this->assertNotNull($read->metadata?->creationTimestamp);
        $this->assertCount(1, $read->rules ?? []);
    }

    public function testReadNonExistentRole(): void
    {
        $name = 'non-existent-role-'.uniqid();

        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }

    public function testReadRoleWithMultipleRules(): void
    {
        // Create a Role with multiple rules
        $name = $this->generateTestResourceName('role-read-multirules');
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
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['secrets'],
                    resourceNames: ['my-secret']
                ),
            ]
        );

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdRoles[] = $name;

        // Read the Role
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertCount(3, $read->rules ?? []);

        // Verify first rule
        $this->assertSame(['get', 'list', 'watch'], $read->rules[0]->verbs);
        $this->assertSame([''], $read->rules[0]->apiGroups);
        $this->assertSame(['pods', 'services'], $read->rules[0]->resources);

        // Verify second rule
        $this->assertSame(['get', 'list'], $read->rules[1]->verbs);
        $this->assertSame(['apps'], $read->rules[1]->apiGroups);
        $this->assertSame(['deployments'], $read->rules[1]->resources);

        // Verify third rule
        $this->assertSame(['get'], $read->rules[2]->verbs);
        $this->assertSame(['my-secret'], $read->rules[2]->resourceNames);
    }

    public function testReadWithPrettyParameter(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-read-pretty');
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

        // Read with pretty parameter
        $response = $this->api->read(
            name: $name,
            namespace: $this->namespace,
            queryParameters: ['pretty' => 'true']
        );

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertSame($name, $read->metadata?->name);
    }

    public function testReadRoleWithMultipleLabels(): void
    {
        // Create a Role with multiple labels
        $name = $this->generateTestResourceName('role-read-labels');
        $labels = [
            'app' => 'test-app',
            'env' => 'production',
            'rbac-type' => 'read-only',
            'team' => 'platform',
        ];

        $role = new Role(
            metadata: $this->createMetadata($name, $labels),
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
        $this->createdRoles[] = $name;

        // Read the Role
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertArrayHasKey('app', $read->metadata?->labels ?? []);
        $this->assertSame('test-app', $read->metadata?->labels['app']);
        $this->assertSame('production', $read->metadata?->labels['env']);
        $this->assertSame('read-only', $read->metadata?->labels['rbac-type']);
        $this->assertSame('platform', $read->metadata?->labels['team']);
    }

    public function testReadRoleWithWildcardVerbs(): void
    {
        // Create a Role with wildcard verbs
        $name = $this->generateTestResourceName('role-read-wildcard');
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

        $createResponse = $this->api->create($this->namespace, $role);
        $this->assertTrue($createResponse->isSuccessful());
        $this->createdRoles[] = $name;

        // Read the Role
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertSame(['*'], $read->rules[0]->verbs);
    }

    public function testReadVerifyResourceVersion(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-read-version');
        $role = new Role(
            metadata: $this->createMetadata($name),
            rules: [
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
        $this->createdRoles[] = $name;

        // Read the Role
        $response = $this->api->read($name, $this->namespace);

        $this->assertTrue($response->isSuccessful());

        $read = $response->getContent();
        $this->assertInstanceOf(Role::class, $read);
        $this->assertNotNull($read->metadata?->resourceVersion);
        $this->assertSame($created->metadata?->resourceVersion, $read->metadata?->resourceVersion);
    }
}
