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
use P8p\Sdk\Schema\Storage\V1\CSIDriver;
use P8p\Sdk\Schema\Storage\V1\CSIDriverList;

class CSIDriverApi extends AbstractApi
{
    /**
     * List or watch objects of kind CSIDriver.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CSIDriverList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/csidrivers',
            responseClass: CSIDriverList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a CSIDriver.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CSIDriver>
     */
    public function create(CSIDriver $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/storage.k8s.io/v1/csidrivers',
            responseClass: CSIDriver::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of CSIDriver.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/csidrivers',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified CSIDriver.
     *
     * @param string                      $name            name of the CSIDriver
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CSIDriver>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/storage.k8s.io/v1/csidrivers/{name}',
            pathParameters: ['name' => $name],
            responseClass: CSIDriver::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified CSIDriver.
     *
     * @param string                                                                                                       $name            name of the CSIDriver
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CSIDriver>
     */
    public function replace(string $name, CSIDriver $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/storage.k8s.io/v1/csidrivers/{name}',
            pathParameters: ['name' => $name],
            responseClass: CSIDriver::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a CSIDriver.
     *
     * @param string                                                                                                                                                                                                        $name            name of the CSIDriver
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<CSIDriver>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/storage.k8s.io/v1/csidrivers/{name}',
            pathParameters: ['name' => $name],
            responseClass: CSIDriver::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified CSIDriver.
     *
     * @param string                                                                                                                          $name            name of the CSIDriver
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CSIDriver>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/storage.k8s.io/v1/csidrivers/{name}',
            pathParameters: ['name' => $name],
            responseClass: CSIDriver::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
