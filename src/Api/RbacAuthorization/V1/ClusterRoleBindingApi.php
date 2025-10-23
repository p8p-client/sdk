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
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;
use P8p\Sdk\Schema\Rbac\V1\ClusterRoleBinding;
use P8p\Sdk\Schema\Rbac\V1\ClusterRoleBindingList;

class ClusterRoleBindingApi extends AbstractApi
{
    /**
     * List or watch objects of kind ClusterRoleBinding.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ClusterRoleBindingList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
            responseClass: ClusterRoleBindingList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ClusterRoleBinding.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ClusterRoleBinding>
     */
    public function create(ClusterRoleBinding $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
            responseClass: ClusterRoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ClusterRoleBinding.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ClusterRoleBinding.
     *
     * @param string                      $name            name of the ClusterRoleBinding
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ClusterRoleBinding>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRoleBinding::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ClusterRoleBinding.
     *
     * @param string                                                                                                       $name            name of the ClusterRoleBinding
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ClusterRoleBinding>
     */
    public function replace(string $name, ClusterRoleBinding $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ClusterRoleBinding.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ClusterRoleBinding
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ClusterRoleBinding.
     *
     * @param string                                                                                                                          $name            name of the ClusterRoleBinding
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ClusterRoleBinding>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ClusterRoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
