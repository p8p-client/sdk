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

class NodeProxyOptionsApi extends AbstractApi
{
    /**
     * Connect GET requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeleteNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchNodeProxy(string $name, array $queryParameters = []): WebSocketConnection
    {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy',
            pathParameters: ['name' => $name],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect GET requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeleteNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Node.
     *
     * @param string                    $name            name of the NodeProxyOptions
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchNodeProxyWithPath(
        string $name,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/nodes/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }
}
