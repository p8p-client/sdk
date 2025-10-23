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

namespace P8p\Sdk\Api\Autoscaling\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Autoscaling\V1\Scale;

class ScaleApi extends AbstractApi
{
    /**
     * Read scale of the specified ReplicationController.
     *
     * @param string                      $name            name of the Scale
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function readCoreV1ReplicationController(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace scale of the specified ReplicationController.
     *
     * @param string                                                                                                       $name            name of the Scale
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function replaceCoreV1ReplicationController(
        string $name,
        string $namespace,
        Scale $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update scale of the specified ReplicationController.
     *
     * @param string                                                                                                                          $name            name of the Scale
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function patchCoreV1ReplicationController(
        string $name,
        string $namespace,
        array $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/namespaces/{namespace}/replicationcontrollers/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read scale of the specified Deployment.
     *
     * @param string                      $name            name of the Scale
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function readAppsV1Deployment(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace scale of the specified Deployment.
     *
     * @param string                                                                                                       $name            name of the Scale
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function replaceAppsV1Deployment(
        string $name,
        string $namespace,
        Scale $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update scale of the specified Deployment.
     *
     * @param string                                                                                                                          $name            name of the Scale
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function patchAppsV1Deployment(
        string $name,
        string $namespace,
        array $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apps/v1/namespaces/{namespace}/deployments/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read scale of the specified ReplicaSet.
     *
     * @param string                      $name            name of the Scale
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function readAppsV1ReplicaSet(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace scale of the specified ReplicaSet.
     *
     * @param string                                                                                                       $name            name of the Scale
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function replaceAppsV1ReplicaSet(
        string $name,
        string $namespace,
        Scale $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update scale of the specified ReplicaSet.
     *
     * @param string                                                                                                                          $name            name of the Scale
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function patchAppsV1ReplicaSet(
        string $name,
        string $namespace,
        array $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apps/v1/namespaces/{namespace}/replicasets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read scale of the specified StatefulSet.
     *
     * @param string                      $name            name of the Scale
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function readAppsV1StatefulSet(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace scale of the specified StatefulSet.
     *
     * @param string                                                                                                       $name            name of the Scale
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function replaceAppsV1StatefulSet(
        string $name,
        string $namespace,
        Scale $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update scale of the specified StatefulSet.
     *
     * @param string                                                                                                                          $name            name of the Scale
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Scale>
     */
    public function patchAppsV1StatefulSet(
        string $name,
        string $namespace,
        array $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/scale',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Scale::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
