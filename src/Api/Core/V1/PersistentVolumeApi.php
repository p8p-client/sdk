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
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\PersistentVolume;
use P8p\Sdk\Schema\Core\V1\PersistentVolumeList;
use P8p\Sdk\Schema\Core\V1\Status;

class PersistentVolumeApi extends AbstractApi
{
    /**
     * List or watch objects of kind PersistentVolume.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<PersistentVolumeList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/persistentvolumes',
            responseClass: PersistentVolumeList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a PersistentVolume.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function create(PersistentVolume $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/persistentvolumes',
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of PersistentVolume.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/persistentvolumes',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified PersistentVolume.
     *
     * @param string                      $name            name of the PersistentVolume
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/persistentvolumes/{name}',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified PersistentVolume.
     *
     * @param string                                                                                                       $name            name of the PersistentVolume
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function replace(string $name, PersistentVolume $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/persistentvolumes/{name}',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a PersistentVolume.
     *
     * @param string                                                                                                                                                                                                        $name            name of the PersistentVolume
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/api/v1/persistentvolumes/{name}',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified PersistentVolume.
     *
     * @param string                                                                                                                          $name            name of the PersistentVolume
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/persistentvolumes/{name}',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified PersistentVolume.
     *
     * @param string                      $name            name of the PersistentVolume
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/persistentvolumes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified PersistentVolume.
     *
     * @param string                                                                                                       $name            name of the PersistentVolume
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function replaceStatus(string $name, PersistentVolume $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/api/v1/persistentvolumes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified PersistentVolume.
     *
     * @param string                                                                                                                          $name            name of the PersistentVolume
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<PersistentVolume>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/api/v1/persistentvolumes/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PersistentVolume::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
