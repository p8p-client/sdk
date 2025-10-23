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
use P8p\Sdk\Schema\Authentication\V1\SelfSubjectReview;

class SelfSubjectReviewApi extends AbstractApi
{
    /**
     * Create a SelfSubjectReview.
     *
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<SelfSubjectReview>
     */
    public function create(SelfSubjectReview $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/authentication.k8s.io/v1/selfsubjectreviews',
            responseClass: SelfSubjectReview::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
