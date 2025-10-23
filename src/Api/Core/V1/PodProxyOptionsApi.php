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

class PodProxyOptionsApi extends AbstractApi
{
    /**
     * Connect GET requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeletePodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchPodProxy(
        string $name,
        string $namespace,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect GET requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectGetPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PUT requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPutPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect POST requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPostPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect DELETE requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectDeletePodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectOptionsPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect HEAD requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectHeadPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }

    /**
     * Connect PATCH requests to proxy of Pod.
     *
     * @param string                    $name            name of the PodProxyOptions
     * @param string                    $namespace       object name and auth scope, such as for teams and projects
     * @param string                    $path            path to the resource
     * @param array{path?: string|null} $queryParameters
     */
    public function connectPatchPodProxyWithPath(
        string $name,
        string $namespace,
        string $path,
        array $queryParameters = [],
    ): WebSocketConnection {
        return $this->client->makeWebSocketConnection(
            path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}',
            pathParameters: ['name' => $name, 'namespace' => $namespace, 'path' => $path],
            queryParameters: $queryParameters,
        );
    }
}
