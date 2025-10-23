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

namespace P8p\Sdk\Api\Storage\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;
use P8p\Sdk\Schema\Storage\V1\CSIStorageCapacity;
use P8p\Sdk\Schema\Storage\V1\CSIStorageCapacityList;

class CSIStorageCapacityApi extends AbstractApi
{
    /**
     * List or watch objects of kind CSIStorageCapacity.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CSIStorageCapacityList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/csistoragecapacities',
            responseClass: CSIStorageCapacityList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind CSIStorageCapacity.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CSIStorageCapacityList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
            pathParameters: ['namespace' => $namespace],
            responseClass: CSIStorageCapacityList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a CSIStorageCapacity.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CSIStorageCapacity>
     */
    public function create(string $namespace, CSIStorageCapacity $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
            pathParameters: ['namespace' => $namespace],
            responseClass: CSIStorageCapacity::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of CSIStorageCapacity.
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
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified CSIStorageCapacity.
     *
     * @param string                      $name            name of the CSIStorageCapacity
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CSIStorageCapacity>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CSIStorageCapacity::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified CSIStorageCapacity.
     *
     * @param string                                                                                                       $name            name of the CSIStorageCapacity
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CSIStorageCapacity>
     */
    public function replace(
        string $name,
        string $namespace,
        CSIStorageCapacity $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CSIStorageCapacity::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a CSIStorageCapacity.
     *
     * @param string                                                                                                                                                                                                        $name            name of the CSIStorageCapacity
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
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified CSIStorageCapacity.
     *
     * @param string                                                                                                                          $name            name of the CSIStorageCapacity
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CSIStorageCapacity>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CSIStorageCapacity::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
