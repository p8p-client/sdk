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

namespace P8p\Sdk\Api\Discovery\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Discovery\V1\EndpointSlice;
use P8p\Sdk\Schema\Discovery\V1\EndpointSliceList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class EndpointSliceApi extends AbstractApi
{
    /**
     * List or watch objects of kind EndpointSlice.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<EndpointSliceList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/discovery.k8s.io/v1/endpointslices',
            responseClass: EndpointSliceList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind EndpointSlice.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<EndpointSliceList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices',
            pathParameters: ['namespace' => $namespace],
            responseClass: EndpointSliceList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create an EndpointSlice.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<EndpointSlice>
     */
    public function create(string $namespace, EndpointSlice $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices',
            pathParameters: ['namespace' => $namespace],
            responseClass: EndpointSlice::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of EndpointSlice.
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
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified EndpointSlice.
     *
     * @param string                      $name            name of the EndpointSlice
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<EndpointSlice>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: EndpointSlice::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified EndpointSlice.
     *
     * @param string                                                                                                       $name            name of the EndpointSlice
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<EndpointSlice>
     */
    public function replace(
        string $name,
        string $namespace,
        EndpointSlice $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: EndpointSlice::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete an EndpointSlice.
     *
     * @param string                                                                                                                                                                                                        $name            name of the EndpointSlice
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
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified EndpointSlice.
     *
     * @param string                                                                                                                          $name            name of the EndpointSlice
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<EndpointSlice>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/discovery.k8s.io/v1/namespaces/{namespace}/endpointslices/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: EndpointSlice::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
