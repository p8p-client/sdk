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
use P8p\Sdk\Schema\Metrics\V1beta1\NodeMetrics;
use P8p\Sdk\Schema\Metrics\V1beta1\NodeMetricsList;

class NodeMetricsApi extends AbstractApi
{
    /**
     * List objects of kind NodeMetrics.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<NodeMetricsList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/metrics.k8s.io/v1beta1/nodes',
            responseClass: NodeMetricsList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified NodeMetrics.
     *
     * @param string                      $name            name of the NodeMetrics
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<NodeMetrics>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/metrics.k8s.io/v1beta1/nodes/{name}',
            pathParameters: ['name' => $name],
            responseClass: NodeMetrics::class,
            queryParameters: $queryParameters,
        );
    }
}
