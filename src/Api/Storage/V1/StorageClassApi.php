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

namespace P8p\Sdk\Api\Storage\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;
use P8p\Sdk\Schema\Storage\V1\StorageClass;
use P8p\Sdk\Schema\Storage\V1\StorageClassList;

class StorageClassApi extends AbstractApi
{
    /**
     * List or watch objects of kind StorageClass.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<StorageClassList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/storageclasses',
            responseClass: StorageClassList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a StorageClass.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<StorageClass>
     */
    public function create(StorageClass $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/storage.k8s.io/v1/storageclasses',
            responseClass: StorageClass::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of StorageClass.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/storageclasses',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified StorageClass.
     *
     * @param string                      $name            name of the StorageClass
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<StorageClass>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/storageclasses/{name}',
            pathParameters: ['name' => $name],
            responseClass: StorageClass::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified StorageClass.
     *
     * @param string                                                                                                       $name            name of the StorageClass
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<StorageClass>
     */
    public function replace(string $name, StorageClass $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/storage.k8s.io/v1/storageclasses/{name}',
            pathParameters: ['name' => $name],
            responseClass: StorageClass::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a StorageClass.
     *
     * @param string                                                                                                                                                                                                        $name            name of the StorageClass
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<StorageClass>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/storageclasses/{name}',
            pathParameters: ['name' => $name],
            responseClass: StorageClass::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified StorageClass.
     *
     * @param string                                                                                                                          $name            name of the StorageClass
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<StorageClass>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/storage.k8s.io/v1/storageclasses/{name}',
            pathParameters: ['name' => $name],
            responseClass: StorageClass::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
