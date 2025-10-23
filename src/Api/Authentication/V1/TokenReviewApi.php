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
use P8p\Sdk\Schema\Authentication\V1\TokenReview;

class TokenReviewApi extends AbstractApi
{
    /**
     * Create a TokenReview.
     *
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<TokenReview>
     */
    public function create(TokenReview $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/authentication.k8s.io/v1/tokenreviews',
            responseClass: TokenReview::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
