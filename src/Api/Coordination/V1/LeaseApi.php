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

namespace P8p\Sdk\Api\Coordination\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Coordination\V1\Lease;
use P8p\Sdk\Schema\Coordination\V1\LeaseList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class LeaseApi extends AbstractApi
{
    /**
     * List or watch objects of kind Lease.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<LeaseList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/coordination.k8s.io/v1/leases',
            responseClass: LeaseList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind Lease.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<LeaseList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases',
            pathParameters: ['namespace' => $namespace],
            responseClass: LeaseList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a Lease.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Lease>
     */
    public function create(string $namespace, Lease $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases',
            pathParameters: ['namespace' => $namespace],
            responseClass: Lease::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of Lease.
     *
     * @param string                                                                                                                                                                                                                                                                                                                                                                                                                                         $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(string $namespace, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified Lease.
     *
     * @param string                      $name            name of the Lease
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Lease>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Lease::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified Lease.
     *
     * @param string                                                                                                       $name            name of the Lease
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Lease>
     */
    public function replace(string $name, string $namespace, Lease $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Lease::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a Lease.
     *
     * @param string                                                                                                                                                                                                        $name            name of the Lease
     * @param string                                                                                                                                                                                                        $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(
        string $name,
        string $namespace,
        DeleteOptions $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified Lease.
     *
     * @param string                                                                                                                          $name            name of the Lease
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Lease>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/coordination.k8s.io/v1/namespaces/{namespace}/leases/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Lease::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
