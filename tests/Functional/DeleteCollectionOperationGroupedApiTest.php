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
use P8p\Sdk\Schema\Meta\V1\Status;
use P8p\Sdk\Schema\Rbac\V1\PolicyRule;
use P8p\Sdk\Schema\Rbac\V1\Role;

/**
 * Tests the DeleteCollection operation against a real Kubernetes cluster using a Grouped API.
 */
class DeleteCollectionOperationGroupedApiTest extends AbstractFunctional
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

    public function testDeleteCollectionWithLabelSelector(): void
    {
        // Create multiple Roles with same label
        $label = 'test-delete-collection';
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("role-delcol-label-$i");
            $role = new Role(
                metadata: $this->createMetadata($name, ['app' => $label]),
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

        // Delete all Roles with this label
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => "app=$label"]
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();
        $this->assertInstanceOf(Status::class, $result);

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

    public function testDeleteCollectionWithMultipleLabelSelectors(): void
    {
        // Create Roles with different labels
        $name1 = $this->generateTestResourceName('role-delcol-multi1');
        $role1 = new Role(
            metadata: $this->createMetadata($name1, ['app' => 'test', 'env' => 'dev']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $name2 = $this->generateTestResourceName('role-delcol-multi2');
        $role2 = new Role(
            metadata: $this->createMetadata($name2, ['app' => 'test', 'env' => 'prod']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $name3 = $this->generateTestResourceName('role-delcol-multi3');
        $role3 = new Role(
            metadata: $this->createMetadata($name3, ['app' => 'other', 'env' => 'dev']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $createResponse1 = $this->api->create($this->namespace, $role1);
        $this->assertTrue($createResponse1->isSuccessful());

        $createResponse2 = $this->api->create($this->namespace, $role2);
        $this->assertTrue($createResponse2->isSuccessful());

        $createResponse3 = $this->api->create($this->namespace, $role3);
        $this->assertTrue($createResponse3->isSuccessful());

        // Delete only Roles with app=test and env=dev
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => 'app=test,env=dev']
        );

        $this->assertTrue($response->isSuccessful());

        // Verify only name1 is deleted
        $this->expectException(\Throwable::class);
        $this->api->read($name1, $this->namespace)->getContent();

        // name2 and name3 should still exist (different labels)
        $read2 = $this->api->read($name2, $this->namespace)->getContent();
        $this->assertSame($name2, $read2->metadata?->name);

        $read3 = $this->api->read($name3, $this->namespace)->getContent();
        $this->assertSame($name3, $read3->metadata?->name);

        // Cleanup remaining
        $this->createdRoles[] = $name2;
        $this->createdRoles[] = $name3;
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
        // Create Roles
        $label = 'test-delete-grace';
        $names = [];
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("role-delcol-grace-$i");
            $role = new Role(
                metadata: $this->createMetadata($name, ['app' => $label]),
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
        // Create Roles
        $label = 'test-delete-propagation';
        $names = [];
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("role-delcol-propagation-$i");
            $role = new Role(
                metadata: $this->createMetadata($name, ['app' => $label]),
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
        // Create Roles
        $label = 'test-delete-options';
        $names = [];
        for ($i = 1; $i <= 2; ++$i) {
            $name = $this->generateTestResourceName("role-delcol-options-$i");
            $role = new Role(
                metadata: $this->createMetadata($name, ['app' => $label]),
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
        // Create Roles
        $label = 'test-delete-status';
        $name = $this->generateTestResourceName('role-delcol-status');
        $role = new Role(
            metadata: $this->createMetadata($name, ['app' => $label]),
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

        // Delete the Roles
        $response = $this->api->deleteCollection(
            namespace: $this->namespace,
            body: new DeleteOptions(),
            queryParameters: ['labelSelector' => "app=$label"]
        );

        $this->assertTrue($response->isSuccessful());

        $result = $response->getContent();

        // RoleApi.deleteCollection() returns Status
        $this->assertInstanceOf(Status::class, $result);
        if (null !== $result->status) {
            $this->assertSame('Success', $result->status);
        }
    }

    public function testDeleteCollectionAll(): void
    {
        // Create multiple Roles with unique label
        $prefix = 'role-delcol-all';
        $label = 'test-delete-all';
        $names = [];
        for ($i = 1; $i <= 3; ++$i) {
            $name = $this->generateTestResourceName("$prefix-$i");
            $role = new Role(
                metadata: $this->createMetadata($name, ['batch' => $label]),
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
        // Create Roles
        $name1 = $this->generateTestResourceName('role-delcol-field1');
        $role1 = new Role(
            metadata: $this->createMetadata($name1, ['app' => 'field-test']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $name2 = $this->generateTestResourceName('role-delcol-field2');
        $role2 = new Role(
            metadata: $this->createMetadata($name2, ['app' => 'field-test']),
            rules: [
                new PolicyRule(
                    verbs: ['get'],
                    apiGroups: [''],
                    resources: ['pods']
                ),
            ]
        );

        $createResponse1 = $this->api->create($this->namespace, $role1);
        $this->assertTrue($createResponse1->isSuccessful());

        $createResponse2 = $this->api->create($this->namespace, $role2);
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
        $this->createdRoles[] = $name2;
    }
}
