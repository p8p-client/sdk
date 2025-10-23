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
use P8p\Sdk\Schema\Flowcontrol\V1\PriorityLevelConfiguration;
use P8p\Sdk\Schema\Flowcontrol\V1\PriorityLevelConfigurationList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class PriorityLevelConfigurationApi extends AbstractApi
{
    /**
     * List or watch objects of kind PriorityLevelConfiguration.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<PriorityLevelConfigurationList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
            responseClass: PriorityLevelConfigurationList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a PriorityLevelConfiguration.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function create(PriorityLevelConfiguration $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
            responseClass: PriorityLevelConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of PriorityLevelConfiguration.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified PriorityLevelConfiguration.
     *
     * @param string                      $name            name of the PriorityLevelConfiguration
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified PriorityLevelConfiguration.
     *
     * @param string                                                                                                       $name            name of the PriorityLevelConfiguration
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function replace(string $name, PriorityLevelConfiguration $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a PriorityLevelConfiguration.
     *
     * @param string                                                                                                                                                                                                        $name            name of the PriorityLevelConfiguration
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified PriorityLevelConfiguration.
     *
     * @param string                                                                                                                          $name            name of the PriorityLevelConfiguration
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified PriorityLevelConfiguration.
     *
     * @param string                      $name            name of the PriorityLevelConfiguration
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified PriorityLevelConfiguration.
     *
     * @param string                                                                                                       $name            name of the PriorityLevelConfiguration
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function replaceStatus(
        string $name,
        PriorityLevelConfiguration $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified PriorityLevelConfiguration.
     *
     * @param string                                                                                                                          $name            name of the PriorityLevelConfiguration
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<PriorityLevelConfiguration>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: PriorityLevelConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
