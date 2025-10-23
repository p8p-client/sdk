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

namespace P8p\Sdk\Api\Core\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Core\V1\ResourceQuota;
use P8p\Sdk\Schema\Core\V1\ResourceQuotaList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class ResourceQuotaApi extends AbstractApi
{
    /**
     * List or watch objects of kind ResourceQuota.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ResourceQuotaList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/resourcequotas',
            pathParameters: ['namespace' => $namespace],
            responseClass: ResourceQuotaList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ResourceQuota.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function create(string $namespace, ResourceQuota $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces/{namespace}/resourcequotas',
            pathParameters: ['namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ResourceQuota.
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
            path: '/api/v1/namespaces/{namespace}/resourcequotas',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ResourceQuota.
     *
     * @param string                      $name            name of the ResourceQuota
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ResourceQuota.
     *
     * @param string                                                                                                       $name            name of the ResourceQuota
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function replace(
        string $name,
        string $namespace,
        ResourceQuota $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ResourceQuota.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ResourceQuota
     * @param string                                                                                                                                                                                                        $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function delete(
        string $name,
        string $namespace,
        DeleteOptions $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ResourceQuota.
     *
     * @param string                                                                                                                          $name            name of the ResourceQuota
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified ResourceQuota.
     *
     * @param string                      $name            name of the ResourceQuota
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function readStatus(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified ResourceQuota.
     *
     * @param string                                                                                                       $name            name of the ResourceQuota
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function replaceStatus(
        string $name,
        string $namespace,
        ResourceQuota $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified ResourceQuota.
     *
     * @param string                                                                                                                          $name            name of the ResourceQuota
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ResourceQuota>
     */
    public function patchStatus(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{namespace}/resourcequotas/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ResourceQuota::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind ResourceQuota.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ResourceQuotaList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/resourcequotas',
            responseClass: ResourceQuotaList::class,
            queryParameters: $queryParameters,
        );
    }
}
