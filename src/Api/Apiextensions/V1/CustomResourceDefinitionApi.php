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

namespace P8p\Sdk\Api\Apiextensions\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Apiextensions\V1\CustomResourceDefinition;
use P8p\Sdk\Schema\Apiextensions\V1\CustomResourceDefinitionList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class CustomResourceDefinitionApi extends AbstractApi
{
    /**
     * List or watch objects of kind CustomResourceDefinition.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CustomResourceDefinitionList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
            responseClass: CustomResourceDefinitionList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a CustomResourceDefinition.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function create(CustomResourceDefinition $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
            responseClass: CustomResourceDefinition::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of CustomResourceDefinition.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified CustomResourceDefinition.
     *
     * @param string                      $name            name of the CustomResourceDefinition
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified CustomResourceDefinition.
     *
     * @param string                                                                                                       $name            name of the CustomResourceDefinition
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function replace(string $name, CustomResourceDefinition $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a CustomResourceDefinition.
     *
     * @param string                                                                                                                                                                                                        $name            name of the CustomResourceDefinition
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified CustomResourceDefinition.
     *
     * @param string                                                                                                                          $name            name of the CustomResourceDefinition
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified CustomResourceDefinition.
     *
     * @param string                      $name            name of the CustomResourceDefinition
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified CustomResourceDefinition.
     *
     * @param string                                                                                                       $name            name of the CustomResourceDefinition
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function replaceStatus(string $name, CustomResourceDefinition $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified CustomResourceDefinition.
     *
     * @param string                                                                                                                          $name            name of the CustomResourceDefinition
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CustomResourceDefinition>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CustomResourceDefinition::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
