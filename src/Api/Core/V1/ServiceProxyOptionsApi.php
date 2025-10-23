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

class ServiceProxyOptionsApi extends AbstractApi
{
    /**
     * Connect GET requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeleteServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchServiceProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect GET requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeleteServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Service.
     *
     * @param string                    $name            name of the ServiceProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchServiceProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }
}
