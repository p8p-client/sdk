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

namespace P8p\Sdk\Api\RbacAuthorization\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;
use P8p\Sdk\Schema\RbacAuthorization\V1\ClusterRole;
use P8p\Sdk\Schema\RbacAuthorization\V1\ClusterRoleList;

class ClusterRoleApi extends AbstractApi
{
    /**
     * List or watch objects of kind ClusterRole.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ClusterRoleList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles',
            responseClass: ClusterRoleList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ClusterRole.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ClusterRole>
     */
    public function create(ClusterRole $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles',
            responseClass: ClusterRole::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ClusterRole.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ClusterRole.
     *
     * @param string                      $name            name of the ClusterRole
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ClusterRole>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRole::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ClusterRole.
     *
     * @param string                                                                                                       $name            name of the ClusterRole
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ClusterRole>
     */
    public function replace(string $name, ClusterRole $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRole::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ClusterRole.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ClusterRole
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ClusterRole.
     *
     * @param string                                                                                                                          $name            name of the ClusterRole
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ClusterRole>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterroles/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRole::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
