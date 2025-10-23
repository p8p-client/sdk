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
use P8p\Sdk\Schema\Storage\V1\VolumeAttachment;
use P8p\Sdk\Schema\Storage\V1\VolumeAttachmentList;

class VolumeAttachmentApi extends AbstractApi
{
    /**
     * List or watch objects of kind VolumeAttachment.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<VolumeAttachmentList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/volumeattachments',
            responseClass: VolumeAttachmentList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a VolumeAttachment.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function create(VolumeAttachment $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/storage.k8s.io/v1/volumeattachments',
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of VolumeAttachment.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/volumeattachments',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified VolumeAttachment.
     *
     * @param string                      $name            name of the VolumeAttachment
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified VolumeAttachment.
     *
     * @param string                                                                                                       $name            name of the VolumeAttachment
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function replace(string $name, VolumeAttachment $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a VolumeAttachment.
     *
     * @param string                                                                                                                                                                                                        $name            name of the VolumeAttachment
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified VolumeAttachment.
     *
     * @param string                                                                                                                          $name            name of the VolumeAttachment
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified VolumeAttachment.
     *
     * @param string                      $name            name of the VolumeAttachment
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified VolumeAttachment.
     *
     * @param string                                                                                                       $name            name of the VolumeAttachment
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function replaceStatus(string $name, VolumeAttachment $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified VolumeAttachment.
     *
     * @param string                                                                                                                          $name            name of the VolumeAttachment
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<VolumeAttachment>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: VolumeAttachment::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
