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

namespace P8p\Sdk\Api\Admissionregistration\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Admissionregistration\V1\MutatingWebhookConfiguration;
use P8p\Sdk\Schema\Admissionregistration\V1\MutatingWebhookConfigurationList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class MutatingWebhookConfigurationApi extends AbstractApi
{
    /**
     * List or watch objects of kind MutatingWebhookConfiguration.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<MutatingWebhookConfigurationList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
            responseClass: MutatingWebhookConfigurationList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a MutatingWebhookConfiguration.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<MutatingWebhookConfiguration>
     */
    public function create(MutatingWebhookConfiguration $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
            responseClass: MutatingWebhookConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of MutatingWebhookConfiguration.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified MutatingWebhookConfiguration.
     *
     * @param string                      $name            name of the MutatingWebhookConfiguration
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<MutatingWebhookConfiguration>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: MutatingWebhookConfiguration::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified MutatingWebhookConfiguration.
     *
     * @param string                                                                                                       $name            name of the MutatingWebhookConfiguration
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<MutatingWebhookConfiguration>
     */
    public function replace(string $name, MutatingWebhookConfiguration $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: MutatingWebhookConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a MutatingWebhookConfiguration.
     *
     * @param string                                                                                                                                                                                                        $name            name of the MutatingWebhookConfiguration
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified MutatingWebhookConfiguration.
     *
     * @param string                                                                                                                          $name            name of the MutatingWebhookConfiguration
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<MutatingWebhookConfiguration>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
            pathParameters: ['name' => $name],
            responseClass: MutatingWebhookConfiguration::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
