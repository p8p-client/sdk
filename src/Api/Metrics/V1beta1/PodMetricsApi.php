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

namespace P8p\Sdk\Api\Metrics\V1beta1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Metrics\V1beta1\PodMetrics;
use P8p\Sdk\Schema\Metrics\V1beta1\PodMetricsList;

class PodMetricsApi extends AbstractApi
{
    /**
     * List objects of kind PodMetrics.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<PodMetricsList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/metrics.k8s.io/v1beta1/namespaces/{namespace}/pods',
            pathParameters: ['namespace' => $namespace],
            responseClass: PodMetricsList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified PodMetrics.
     *
     * @param string                      $name            name of the PodMetrics
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<PodMetrics>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/metrics.k8s.io/v1beta1/namespaces/{namespace}/pods/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: PodMetrics::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List objects of kind PodMetrics.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<PodMetricsList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/metrics.k8s.io/v1beta1/pods',
            responseClass: PodMetricsList::class,
            queryParameters: $queryParameters,
        );
    }
}
