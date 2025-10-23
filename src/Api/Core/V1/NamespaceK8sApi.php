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
use P8p\Sdk\Schema\Core\V1\NamespaceK8s;
use P8p\Sdk\Schema\Core\V1\NamespaceList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class NamespaceK8sApi extends AbstractApi
{
    /**
     * List or watch objects of kind Namespace.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<NamespaceList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces',
            responseClass: NamespaceList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a Namespace.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function create(NamespaceK8s $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces',
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified Namespace.
     *
     * @param string                      $name            name of the Namespace
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{name}',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified Namespace.
     *
     * @param string                                                                                                       $name            name of the Namespace
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function replace(string $name, NamespaceK8s $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{name}',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a Namespace.
     *
     * @param string                                                                                                                                                                                                        $name            name of the Namespace
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/namespaces/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified Namespace.
     *
     * @param string                                                                                                                          $name            name of the Namespace
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{name}',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace finalize of the specified Namespace.
     *
     * @param string                                                                                                       $name            name of the Namespace
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function replaceFinalize(string $name, NamespaceK8s $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{name}/finalize',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified Namespace.
     *
     * @param string                      $name            name of the Namespace
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified Namespace.
     *
     * @param string                                                                                                       $name            name of the Namespace
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function replaceStatus(string $name, NamespaceK8s $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified Namespace.
     *
     * @param string                                                                                                                          $name            name of the Namespace
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<NamespaceK8s>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: NamespaceK8s::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
