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
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;
use P8p\Sdk\Schema\RbacAuthorization\V1\PolicyRule;
use P8p\Sdk\Schema\RbacAuthorization\V1\Role;

/**
 * Tests the Delete operation against a real Kubernetes cluster using a Grouped API.
 */
class DeleteOperationGroupedApiTest extends AbstractFunctional
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

    public function testDeleteExistingRole(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-delete-basic');
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

        // Delete the Role
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();
        $this->assertInstanceOf(Status::class, $result);

        // Verify the Role no longer exists
        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }

    public function testDeleteNonExistentRoleFails(): void
    {
        $name = $this->generateTestResourceName('role-delete-nonexistent');

        $this->expectException(\Throwable::class);
        $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        )->getContent();
    }

    public function testDeleteWithGracePeriodSeconds(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-delete-grace');
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

        // Delete with gracePeriodSeconds
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['gracePeriodSeconds' => 0]
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteWithPropagationPolicy(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-delete-propagation');
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

        // Delete with propagationPolicy
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['propagationPolicy' => 'Foreground']
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteWithDeleteOptions(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-delete-options');
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

        // Delete with DeleteOptions body
        $deleteOptions = new DeleteOptions(
            gracePeriodSeconds: 0,
            propagationPolicy: 'Background'
        );

        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: $deleteOptions
        );

        $this->assertTrue($response->isSuccessful());
    }

    public function testDeleteMultipleRoles(): void
    {
        // Create multiple Roles
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("role-delete-multi-$i");
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
            $names[] = $name;
        }

        // Delete each Role
        foreach ($names as $name) {
            $response = $this->api->delete(
                name: $name,
                namespace: $this->namespace,
                body: new DeleteOptions()
            );
            $this->assertTrue($response->isSuccessful());
        }

        // Verify all Roles are deleted
        foreach ($names as $name) {
            try {
                $this->api->read($name, $this->namespace)->getContent();
                $this->fail("Role $name should have been deleted");
            } catch (\Throwable) {
                // Expected - Role no longer exists
                $this->assertTrue(true);
            }
        }
    }

    public function testDeleteVerifyStatusResponse(): void
    {
        // Create a Role
        $name = $this->generateTestResourceName('role-delete-status');
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

        // Delete the Role
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();

        $this->assertInstanceOf(Status::class, $result);
        $this->assertSame('Success', $result->status);
    }

    public function testDeleteRoleWithLabels(): void
    {
        // Create a Role with labels
        $name = $this->generateTestResourceName('role-delete-labels');
        $role = new Role(
            metadata: $this->createMetadata($name, ['app' => 'test', 'env' => 'dev']),
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

        // Delete the Role
        $response = $this->api->delete(
            name: $name,
            namespace: $this->namespace,
            body: new DeleteOptions()
        );

        $this->assertTrue($response->isSuccessful());

        // Verify it's deleted
        $this->expectException(\Throwable::class);
        $this->api->read($name, $this->namespace)->getContent();
    }
}
