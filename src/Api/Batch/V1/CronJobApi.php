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

namespace P8p\Sdk\Api\Batch\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Batch\V1\CronJob;
use P8p\Sdk\Schema\Batch\V1\CronJobList;
use P8p\Sdk\Schema\Core\V1\DeleteOptions;
use P8p\Sdk\Schema\Core\V1\Status;

class CronJobApi extends AbstractApi
{
    /**
     * List or watch objects of kind CronJob.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CronJobList>
     */
    public function listForAllNamespaces(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/batch/v1/cronjobs',
            responseClass: CronJobList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * List or watch objects of kind CronJob.
     *
     * @param string                                                                                                                                                                                                                                                                                                           $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<CronJobList>
     */
    public function list(string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs',
            pathParameters: ['namespace' => $namespace],
            responseClass: CronJobList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Create a CronJob.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function create(string $namespace, CronJob $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs',
            pathParameters: ['namespace' => $namespace],
            responseClass: CronJob::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete collection of CronJob.
     *
     * @param string                                                                                                                                                                                                                                                                                                                                                                                                                                         $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, continue?: string|null, dryRun?: string|null, fieldSelector?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, labelSelector?: string|null, limit?: int|null, orphanDependents?: bool|null, propagationPolicy?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function deleteCollection(string $namespace, DeleteOptions $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs',
            pathParameters: ['namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified CronJob.
     *
     * @param string                      $name            name of the CronJob
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function read(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace the specified CronJob.
     *
     * @param string                                                                                                       $name            name of the CronJob
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function replace(string $name, string $namespace, CronJob $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Delete a CronJob.
     *
     * @param string                                                                                                                                                                                                        $name            name of the CronJob
     * @param string                                                                                                                                                                                                        $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, gracePeriodSeconds?: int|null, ignoreStoreReadErrorWithClusterBreakingPotential?: bool|null, orphanDependents?: bool|null, propagationPolicy?: string|null} $queryParameters
     *
     * @return Response<Status>
     */
    public function delete(
        string $name,
        string $namespace,
        DeleteOptions $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'DELETE',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Status::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update the specified CronJob.
     *
     * @param string                                                                                                                          $name            name of the CronJob
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function patch(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read status of the specified CronJob.
     *
     * @param string                      $name            name of the CronJob
     * @param string                      $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function readStatus(string $name, string $namespace, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Replace status of the specified CronJob.
     *
     * @param string                                                                                                       $name            name of the CronJob
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function replaceStatus(
        string $name,
        string $namespace,
        CronJob $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'PUT',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Partially update status of the specified CronJob.
     *
     * @param string                                                                                                                          $name            name of the CronJob
     * @param string                                                                                                                          $namespace       object name and auth scope, such as for teams and projects
     * @param array<mixed>                                                                                                                    $body
     * @param array{pretty?: string|null, dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, force?: bool|null} $queryParameters
     *
     * @return Response<CronJob>
     */
    public function patchStatus(string $name, string $namespace, array $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'PATCH',
            path: '/apis/batch/v1/namespaces/{namespace}/cronjobs/{name}/status',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: CronJob::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
