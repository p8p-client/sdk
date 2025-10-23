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
use P8p\Client\WebSocket\WebSocketConnection;

class PodPortForwardOptionsApi extends AbstractApi
{
    /**
     * Connect GET requests to portforward of Pod.
     *
     * @param string                  $name            name of the PodPortForwardOptions
     * @param string                  $namespace       object name and auth scope, such as for teams and projects
     * @param array{ports?: int|null} $queryParameters
     */
    public function connectGetPodPortforward(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/portforward',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to portforward of Pod.
     *
     * @param string                  $name            name of the PodPortForwardOptions
     * @param string                  $namespace       object name and auth scope, such as for teams and projects
     * @param array{ports?: int|null} $queryParameters
     */
    public function connectPostPodPortforward(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/portforward',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }
}
