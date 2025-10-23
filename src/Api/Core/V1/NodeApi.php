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
use P8p\Client\Response;
use P8p\Sdk\Schema\Core\V1\Node;
use P8p\Sdk\Schema\Core\V1\NodeList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class NodeApi extends AbstractApi
{
    /**
     * List or watch objects of kind Node.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<NodeList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/nodes',
            responseClass: NodeList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a Node.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function create(Node $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/nodes',
            responseClass: Node::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of Node.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/nodes',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified Node.
     *
     * @param string                      $name            name of the Node
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/nodes/{name}',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified Node.
     *
     * @param string                                                                                                       $name            name of the Node
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function replace(string $name, Node $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/nodes/{name}',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a Node.
     *
     * @param string                                                                                                                                                                                                        $name            name of the Node
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/nodes/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified Node.
     *
     * @param string                                                                                                                          $name            name of the Node
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/nodes/{name}',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified Node.
     *
     * @param string                      $name            name of the Node
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/nodes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified Node.
     *
     * @param string                                                                                                       $name            name of the Node
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function replaceStatus(string $name, Node $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/nodes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified Node.
     *
     * @param string                                                                                                                          $name            name of the Node
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<Node>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/nodes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: Node::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
