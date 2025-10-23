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
use P8p\Sdk\Schema\Core\V1\Endpoints;
use P8p\Sdk\Schema\Core\V1\EndpointsList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class EndpointsApi extends AbstractApi
{
    /**
     * List or watch objects of kind Endpoints.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<EndpointsList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/endpoints',
            responseClass: EndpointsList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind Endpoints.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<EndpointsList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/endpoints',
            pathParameters: ['namespace' => $namespace],
            responseClass: EndpointsList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create Endpoints.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Endpoints>
     */
    public function create(string $namespace, Endpoints $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces/{namespace}/endpoints',
            pathParameters: ['namespace' => $namespace],
            responseClass: Endpoints::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of Endpoints.
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
            path: '/api/v1/namespaces/{namespace}/endpoints',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified Endpoints.
     *
     * @param string                      $name            name of the Endpoints
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Endpoints>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/endpoints/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Endpoints::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified Endpoints.
     *
     * @param string                                                                                                       $name            name of the Endpoints
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Endpoints>
     */
    public function replace(string $name, string $namespace, Endpoints $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{namespace}/endpoints/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Endpoints::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete Endpoints.
     *
     * @param string                                                                                                                                                                                                        $name            name of the Endpoints
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
            path: '/api/v1/namespaces/{namespace}/endpoints/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified Endpoints.
     *
     * @param string                                                                                                                          $name            name of the Endpoints
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Endpoints>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{namespace}/endpoints/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Endpoints::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
