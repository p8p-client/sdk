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
use P8p\Sdk\Schema\Admissionregistration\V1\ValidatingAdmissionPolicyBinding;
use P8p\Sdk\Schema\Admissionregistration\V1\ValidatingAdmissionPolicyBindingList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class ValidatingAdmissionPolicyBindingApi extends AbstractApi
{
    /**
     * List or watch objects of kind ValidatingAdmissionPolicyBinding.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyBindingList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
            responseClass: ValidatingAdmissionPolicyBindingList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a ValidatingAdmissionPolicyBinding.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyBinding>
     */
    public function create(ValidatingAdmissionPolicyBinding $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
            responseClass: ValidatingAdmissionPolicyBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of ValidatingAdmissionPolicyBinding.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ValidatingAdmissionPolicyBinding.
     *
     * @param string                      $name            name of the ValidatingAdmissionPolicyBinding
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyBinding>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicyBinding::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified ValidatingAdmissionPolicyBinding.
     *
     * @param string                                                                                                       $name            name of the ValidatingAdmissionPolicyBinding
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyBinding>
     */
    public function replace(
        string $name,
        ValidatingAdmissionPolicyBinding $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicyBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a ValidatingAdmissionPolicyBinding.
     *
     * @param string                                                                                                                                                                                                        $name            name of the ValidatingAdmissionPolicyBinding
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified ValidatingAdmissionPolicyBinding.
     *
     * @param string                                                                                                                          $name            name of the ValidatingAdmissionPolicyBinding
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<ValidatingAdmissionPolicyBinding>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
            pathParameters: ['name' => $name],
            responseClass: ValidatingAdmissionPolicyBinding::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
