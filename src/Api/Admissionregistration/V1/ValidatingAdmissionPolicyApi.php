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
use P8p\Sdk\Schema\Admissionregistration\V1\ValidatingAdmissionPolicy;
use P8p\Sdk\Schema\Admissionregistration\V1\ValidatingAdmissionPolicyList;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\Status;

class ValidatingAdmissionPolicyApi extends AbstractApi
{
    /**
     * List or watch objects of kind ValidatingAdmissionPolicy.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
            responseClass: ValidatingAdmissionPolicyList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ValidatingAdmissionPolicy.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function create(ValidatingAdmissionPolicy $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
            responseClass: ValidatingAdmissionPolicy::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ValidatingAdmissionPolicy.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ValidatingAdmissionPolicy.
     *
     * @param string                      $name            name of the ValidatingAdmissionPolicy
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ValidatingAdmissionPolicy.
     *
     * @param string                                                                                                       $name            name of the ValidatingAdmissionPolicy
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function replace(string $name, ValidatingAdmissionPolicy $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ValidatingAdmissionPolicy.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ValidatingAdmissionPolicy
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ValidatingAdmissionPolicy.
     *
     * @param string                                                                                                                          $name            name of the ValidatingAdmissionPolicy
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified ValidatingAdmissionPolicy.
     *
     * @param string                      $name            name of the ValidatingAdmissionPolicy
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified ValidatingAdmissionPolicy.
     *
     * @param string                                                                                                       $name            name of the ValidatingAdmissionPolicy
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function replaceStatus(
        string $name,
        ValidatingAdmissionPolicy $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified ValidatingAdmissionPolicy.
     *
     * @param string                                                                                                                          $name            name of the ValidatingAdmissionPolicy
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicy>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicy::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
