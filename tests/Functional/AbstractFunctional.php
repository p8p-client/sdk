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

use P8p\Client\Client;
use P8p\Client\ClientFactory;
use PHPUnit\Framework\TestCase;

/**
 * Base class for functional tests that require a real Kubernetes cluster.
 *
 * Tests will be skipped if the Kubernetes API is not accessible.
 *
 * Configuration:
 * - KUBERNETES_API_URL: URL to Kubernetes API (default: http://127.0.0.1:8001 for kubectl proxy)
 * - KUBERNETES_NAMESPACE: Namespace for test resources (default: p8p-test)
 */
abstract class AbstractFunctional extends TestCase
{
    protected Client $client;
    protected string $namespace;
    private static bool $clusterAvailable = true;
    private static bool $namespaceCreated = false;

    protected function setUp(): void
    {
        if (!self::$clusterAvailable) {
            $this->markTestSkipped('Kubernetes cluster is not available');
        }

        try {
            $this->client = $this->createClient();
            $this->namespace = $_ENV['KUBERNETES_NAMESPACE'] ?? 'p8p-test';

            // Verify cluster is accessible
            $this->verifyClusterAccess();

            // Create namespace if not exists (one time per test run)
            if (!self::$namespaceCreated) {
                $this->ensureNamespaceExists();
                self::$namespaceCreated = true;
            }
        } catch (\Throwable $e) {
            self::$clusterAvailable = false;
            $this->markTestSkipped('Cannot connect to Kubernetes cluster: '.$e->getMessage());
        }
    }

    /**
     * Creates a Kubernetes client based on environment configuration.
     */
    private function createClient(): Client
    {
        if ($apiUrl = $_ENV['KUBERNETES_API_URL'] ?? null) {
            return ClientFactory::fromUrl($apiUrl)->getClient();
        }

        throw new \RuntimeException('Cannot create Kubernetes client: KUBERNETES_API_URL is not set');
    }

    /**
     * Verifies that the cluster is accessible by making a simple API call.
     */
    private function verifyClusterAccess(): void
    {
        // Try to list namespaces to verify connectivity
        $response = $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces',
        );

        if (!$response->isSuccessful()) {
            throw new \RuntimeException('Cannot access Kubernetes API');
        }
    }

    /**
     * Ensures that the test namespace exists, creating it if necessary.
     */
    private function ensureNamespaceExists(): void
    {
        try {
            // Try to read the namespace
            $response = $this->client->makeRequest(
                verb: 'GET',
                path: "/api/v1/namespaces/{$this->namespace}"
            );

            if ($response->isSuccessful()) {
                return; // Namespace already exists
            }
        } catch (\Throwable) {
            // Namespace doesn't exist, continue to create it
        }

        // Create the namespace
        $namespace = [
            'apiVersion' => 'v1',
            'kind' => 'Namespace',
            'metadata' => [
                'name' => $this->namespace,
                'labels' => ['p8p-test' => 'true'],
            ],
        ];

        $response = $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces',
            body: $namespace
        );

        if (!$response->isSuccessful()) {
            throw new \RuntimeException("Failed to create namespace '{$this->namespace}'");
        }
    }

    /**
     * Generates a unique name for test resources.
     */
    protected function generateTestResourceName(string $prefix = 'p8p-test'): string
    {
        return sprintf('%s-%s', $prefix, substr(md5(uniqid((string) mt_rand(), true)), 0, 8));
    }

    /**
     * Helper to create metadata for test resources.
     *
     * Automatically adds the 'p8p-test' => 'true' label to all resources
     * for easy cleanup using label selectors.
     */
    protected function createMetadata(string $name, ?array $labels = null): \P8p\Sdk\Schema\Meta\V1\ObjectMeta
    {
        return new \P8p\Sdk\Schema\Meta\V1\ObjectMeta(
            labels: array_merge(
                ['p8p-test' => 'true'],
                $labels ?? []
            ),
            name: $name,
            namespace: $this->namespace
        );
    }

    /**
     * Cleanup all resources created during tests using label selector.
     *
     * This method deletes all resources of the specified API type that have
     * the 'p8p-test' label in the test namespace.
     *
     * @param string $apiClass The API class to use for cleanup (e.g., ConfigMapApi::class)
     */
    protected function cleanupResources(string $apiClass): void
    {
        try {
            $api = $this->client->getApi($apiClass);

            $response = $api->deleteCollection(
                namespace: $this->namespace,
                body: new \P8p\Sdk\Schema\Meta\V1\DeleteOptions(),
                queryParameters: ['labelSelector' => 'p8p-test=true']
            );

            if (!$response->isSuccessful()) {
                fprintf(
                    STDERR,
                    "Warning: Failed to cleanup resources for %s (status: %d)\n",
                    $apiClass,
                    $response->getStatusCode()
                );
            }
        } catch (\Throwable $e) {
            fprintf(
                STDERR,
                "Error during cleanup for %s: %s\n",
                $apiClass,
                $e->getMessage()
            );
        }
    }
}
