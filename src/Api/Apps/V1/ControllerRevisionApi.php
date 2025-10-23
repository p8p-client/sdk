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

namespace P8p\Sdk\Api\Apps\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Apps\V1\ControllerRevision;
use P8p\Sdk\Schema\Apps\V1\ControllerRevisionList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class ControllerRevisionApi extends AbstractApi
{
    /**
     * List or watch objects of kind ControllerRevision.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ControllerRevisionList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/controllerrevisions',
            responseClass: ControllerRevisionList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind ControllerRevision.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ControllerRevisionList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions',
            pathParameters: ['namespace' => $namespace],
            responseClass: ControllerRevisionList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ControllerRevision.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ControllerRevision>
     */
    public function create(string $namespace, ControllerRevision $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions',
            pathParameters: ['namespace' => $namespace],
            responseClass: ControllerRevision::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ControllerRevision.
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
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ControllerRevision.
     *
     * @param string                      $name            name of the ControllerRevision
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ControllerRevision>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ControllerRevision::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ControllerRevision.
     *
     * @param string                                                                                                       $name            name of the ControllerRevision
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ControllerRevision>
     */
    public function replace(
        string $name,
        string $namespace,
        ControllerRevision $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ControllerRevision::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ControllerRevision.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ControllerRevision
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
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ControllerRevision.
     *
     * @param string                                                                                                                          $name            name of the ControllerRevision
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ControllerRevision>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apps/v1/namespaces/{namespace}/controllerrevisions/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: ControllerRevision::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
