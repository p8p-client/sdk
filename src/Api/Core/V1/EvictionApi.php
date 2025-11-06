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

namespace P8p\Sdk\Api\Core\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Core\V1\Eviction;

class EvictionApi extends AbstractApi
{
    /**
     * Create eviction of a Pod.
     *
     * @param string                                                                                                       $name            name of the Eviction
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<Eviction>
     */
    public function createCoreV1Pod(
        string $name,
        string $namespace,
        Eviction $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces/{namespace}/pods/{name}/eviction',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: Eviction::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
