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
use P8p\Sdk\Schema\Core\V1\ComponentStatus;
use P8p\Sdk\Schema\Core\V1\ComponentStatusList;

class ComponentStatusApi extends AbstractApi
{
    /**
     * List objects of kind ComponentStatus.
     *
     * @param array{allowWatchBookmarks?: bool|null, continue?: string|null, fieldSelector?: string|null, labelSelector?: string|null, limit?: int|null, pretty?: string|null, resourceVersion?: string|null, resourceVersionMatch?: string|null, sendInitialEvents?: bool|null, timeoutSeconds?: int|null, watch?: bool|null} $queryParameters
     *
     * @return Response<ComponentStatusList>
     */
    public function list(array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/componentstatuses',
            responseClass: ComponentStatusList::class,
            queryParameters: $queryParameters,
        );
    }

    /**
     * Read the specified ComponentStatus.
     *
     * @param string                      $name            name of the ComponentStatus
     * @param array{pretty?: string|null} $queryParameters
     *
     * @return Response<ComponentStatus>
     */
    public function read(string $name, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'GET',
            path: '/api/v1/componentstatuses/{name}',
            pathParameters: ['name' => $name],
            responseClass: ComponentStatus::class,
            queryParameters: $queryParameters,
        );
    }
}
