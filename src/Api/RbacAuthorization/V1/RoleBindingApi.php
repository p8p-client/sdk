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
use P8p\Sdk\Schema\Rbac\V1\RoleBinding;
use P8p\Sdk\Schema\Rbac\V1\RoleBindingList;

class RoleBindingApi extends AbstractApi
{
    /**
     * List or watch objects of kind RoleBinding.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<RoleBindingList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
            pathParameters: ['namespace' => $namespace],
            responseClass: RoleBindingList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a RoleBinding.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<RoleBinding>
     */
    public function create(string $namespace, RoleBinding $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
            pathParameters: ['namespace' => $namespace],
            responseClass: RoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of RoleBinding.
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
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified RoleBinding.
     *
     * @param string                      $name            name of the RoleBinding
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<RoleBinding>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: RoleBinding::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified RoleBinding.
     *
     * @param string                                                                                                       $name            name of the RoleBinding
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<RoleBinding>
     */
    public function replace(string $name, string $namespace, RoleBinding $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: RoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a RoleBinding.
     *
     * @param string                                                                                                                                                                                                        $name            name of the RoleBinding
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
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified RoleBinding.
     *
     * @param string                                                                                                                          $name            name of the RoleBinding
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<RoleBinding>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: RoleBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind RoleBinding.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<RoleBindingList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/rbac.authorization.k8s.io/v1/rolebindings',
            responseClass: RoleBindingList::class,
            queryParameters: $queryParameters,
        );
    }
}
