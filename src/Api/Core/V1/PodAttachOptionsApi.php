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

class PodAttachOptionsApi extends AbstractApi
{
    /**
     * Connect GET requests to attach of Pod.
     *
     * @param string                                                                                                     $name            name of the PodAttachOptions
     * @param string                                                                                                     $namespace       object name and auth scope, such as for teams and projects
     * @param array{container?: string|null, stderr?: bool|null, stdin?: bool|null, stdout?: bool|null, tty?: bool|null} $queryParameters
     */
    public function connectGetPodAttach(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/attach',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to attach of Pod.
     *
     * @param string                                                                                                     $name            name of the PodAttachOptions
     * @param string                                                                                                     $namespace       object name and auth scope, such as for teams and projects
     * @param array{container?: string|null, stderr?: bool|null, stdin?: bool|null, stdout?: bool|null, tty?: bool|null} $queryParameters
     */
    public function connectPostPodAttach(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/attach',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }
}
