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
 * - KUBERNETES_NAMESPACE: Namespace for test resources (default: default)
 */
abstract class AbstractFunctional extends TestCase
{
    protected Client $client;
    protected string $namespace;
    private static bool $clusterAvailable = true;

    protected function setUp(): void
    {
        if (!self::$clusterAvailable) {
            $this->markTestSkipped('Kubernetes cluster is not available');
        }

        try {
            $this->client = $this->createClient();
            $this->namespace = $_ENV['KUBERNETES_NAMESPACE'] ?? 'default';

            // Verify cluster is accessible
            $this->verifyClusterAccess();
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
     * Generates a unique name for test resources.
     */
    protected function generateTestResourceName(string $prefix = 'p8p-test'): string
    {
        return sprintf('%s-%s', $prefix, substr(md5(uniqid((string) mt_rand(), true)), 0, 8));
    }

    /**
     * Helper to create metadata for test resources.
     */
    protected function createMetadata(string $name, ?array $labels = null): \P8p\Sdk\Schema\Meta\V1\ObjectMeta
    {
        return new \P8p\Sdk\Schema\Meta\V1\ObjectMeta(
            labels: $labels ?? ['test' => 'p8p-functional'],
            name: $name,
            namespace: $this->namespace
        );
    }
}
