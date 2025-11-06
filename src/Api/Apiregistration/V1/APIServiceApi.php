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

namespace P8p\Sdk\Api\Apiregistration\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Apiregistration\V1\APIService;
use P8p\Sdk\Schema\Apiregistration\V1\APIServiceList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class APIServiceApi extends AbstractApi
{
    /**
     * List or watch objects of kind APIService.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<APIServiceList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiregistration.k8s.io/v1/apiservices',
            responseClass: APIServiceList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create an APIService.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function create(APIService $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/apiregistration.k8s.io/v1/apiservices',
            responseClass: APIService::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of APIService.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/apiregistration.k8s.io/v1/apiservices',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified APIService.
     *
     * @param string                      $name            name of the APIService
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified APIService.
     *
     * @param string                                                                                                       $name            name of the APIService
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function replace(string $name, APIService $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete an APIService.
     *
     * @param string                                                                                                                                                                                                        $name            name of the APIService
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified APIService.
     *
     * @param string                                                                                                                          $name            name of the APIService
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified APIService.
     *
     * @param string                      $name            name of the APIService
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified APIService.
     *
     * @param string                                                                                                       $name            name of the APIService
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function replaceStatus(string $name, APIService $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified APIService.
     *
     * @param string                                                                                                                          $name            name of the APIService
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<APIService>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: APIService::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
