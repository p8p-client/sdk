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

namespace P8p\Sdk\Api\Authentication\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Authentication\V1\TokenRequest;

class TokenRequestApi extends AbstractApi
{
    /**
     * Create token of a ServiceAccount.
     *
     * @param string                                                                                                       $name            name of the TokenRequest
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<TokenRequest>
     */
    public function createCoreV1ServiceAccountToken(
        string $name,
        string $namespace,
        TokenRequest $body,
        array $queryParameters = [],
    ): Response {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/api/v1/namespaces/{namespace}/serviceaccounts/{name}/token',
            pathParameters: ['name' => $name, 'namespace' => $namespace],
            responseClass: TokenRequest::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
