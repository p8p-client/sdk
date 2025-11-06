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

namespace P8p\Sdk\Api\Certificates\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Certificates\V1\CertificateSigningRequest;
use P8p\Sdk\Schema\Certificates\V1\CertificateSigningRequestList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class CertificateSigningRequestApi extends AbstractApi
{
    /**
     * List or watch objects of kind CertificateSigningRequest.
     *
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CertificateSigningRequestList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests',
            responseClass: CertificateSigningRequestList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a CertificateSigningRequest.
     *
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function create(CertificateSigningRequest $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests',
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of CertificateSigningRequest.
     *
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests',
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified CertificateSigningRequest.
     *
     * @param string                      $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified CertificateSigningRequest.
     *
     * @param string                                                                                                       $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function replace(string $name, CertificateSigningRequest $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a CertificateSigningRequest.
     *
     * @param string                                                                                                                                                                                                        $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(string $name, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
            pathParameters: ['name' => $name],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified CertificateSigningRequest.
     *
     * @param string                                                                                                                          $name            name of the CertificateSigningRequest
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function patch(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read approval of the specified CertificateSigningRequest.
     *
     * @param string                      $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function readApproval(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace approval of the specified CertificateSigningRequest.
     *
     * @param string                                                                                                       $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function replaceApproval(
        string $name,
        CertificateSigningRequest $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update approval of the specified CertificateSigningRequest.
     *
     * @param string                                                                                                                          $name            name of the CertificateSigningRequest
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function patchApproval(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified CertificateSigningRequest.
     *
     * @param string                      $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function readStatus(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified CertificateSigningRequest.
     *
     * @param string                                                                                                       $name            name of the CertificateSigningRequest
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function replaceStatus(
        string $name,
        CertificateSigningRequest $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified CertificateSigningRequest.
     *
     * @param string                                                                                                                          $name            name of the CertificateSigningRequest
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CertificateSigningRequest>
     */
    public function patchStatus(string $name, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
            pathParameters: ['name' => $name],
            responseClass: CertificateSigningRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
