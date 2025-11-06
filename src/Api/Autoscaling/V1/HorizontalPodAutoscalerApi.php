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
use P8p\Sdk\Schema\Autoscaling\V1\HorizontalPodAutoscaler;
use P8p\Sdk\Schema\Autoscaling\V1\HorizontalPodAutoscalerList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class HorizontalPodAutoscalerApi extends AbstractApi
{
    /**
     * List or watch objects of kind HorizontalPodAutoscaler.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscalerList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/autoscaling/v1/horizontalpodautoscalers',
            responseClass: HorizontalPodAutoscalerList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind HorizontalPodAutoscaler.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscalerList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
            pathParameters: ['namespace' => $namespace],
            responseClass: HorizontalPodAutoscalerList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a HorizontalPodAutoscaler.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function create(string $namespace, HorizontalPodAutoscaler $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
            pathParameters: ['namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of HorizontalPodAutoscaler.
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
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified HorizontalPodAutoscaler.
     *
     * @param string                      $name            name of the HorizontalPodAutoscaler
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified HorizontalPodAutoscaler.
     *
     * @param string                                                                                                       $name            name of the HorizontalPodAutoscaler
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function replace(
        string $name,
        string $namespace,
        HorizontalPodAutoscaler $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a HorizontalPodAutoscaler.
     *
     * @param string                                                                                                                                                                                                        $name            name of the HorizontalPodAutoscaler
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
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified HorizontalPodAutoscaler.
     *
     * @param string                                                                                                                          $name            name of the HorizontalPodAutoscaler
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified HorizontalPodAutoscaler.
     *
     * @param string                      $name            name of the HorizontalPodAutoscaler
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function readStatus(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified HorizontalPodAutoscaler.
     *
     * @param string                                                                                                       $name            name of the HorizontalPodAutoscaler
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function replaceStatus(
        string $name,
        string $namespace,
        HorizontalPodAutoscaler $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified HorizontalPodAutoscaler.
     *
     * @param string                                                                                                                          $name            name of the HorizontalPodAutoscaler
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<HorizontalPodAutoscaler>
     */
    public function patchStatus(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: HorizontalPodAutoscaler::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
