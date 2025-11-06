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

namespace P8p\Sdk\Api\FlowcontrolApiserver\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;
use P8p\Sdk\Schema\FlowcontrolApiserver\V1\FlowSchema;
use P8p\Sdk\Schema\FlowcontrolApiserver\V1\FlowSchemaList;

class FlowSchemaApi extends AbstractApi
{
    /**
     * List or watch objects of kind FlowSchema.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<FlowSchemaList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
            responseClass: FlowSchemaList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a FlowSchema.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function create(FlowSchema $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
            responseClass: FlowSchema::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of FlowSchema.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified FlowSchema.
     *
     * @param string                      $name            name of the FlowSchema
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified FlowSchema.
     *
     * @param string                                                                                                       $name            name of the FlowSchema
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function replace(string $name, FlowSchema $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a FlowSchema.
     *
     * @param string                                                                                                                                                                                                        $name            name of the FlowSchema
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified FlowSchema.
     *
     * @param string                                                                                                                          $name            name of the FlowSchema
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified FlowSchema.
     *
     * @param string                      $name            name of the FlowSchema
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified FlowSchema.
     *
     * @param string                                                                                                       $name            name of the FlowSchema
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function replaceStatus(string $name, FlowSchema $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified FlowSchema.
     *
     * @param string                                                                                                                          $name            name of the FlowSchema
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<FlowSchema>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: FlowSchema::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
