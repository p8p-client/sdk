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

namespace P8p\Sdk\Api\Authorization\V1;

use P8p\Client\Api\AbstractApi;
use P8p\Client\Response;
use P8p\Sdk\Schema\Authorization\V1\LocalSubjectAccessReview;

class LocalSubjectAccessReviewApi extends AbstractApi
{
    /**
     * Create a LocalSubjectAccessReview.
     *
     * @param string                                                                                                       $namespace       object name and auth scope, such as for teams and projects
     * @param array{dryRun?: string|null, fieldManager?: string|null, fieldValidation?: string|null, pretty?: string|null} $queryParameters
     *
     * @return Response<LocalSubjectAccessReview>
     */
    public function create(string $namespace, LocalSubjectAccessReview $body, array $queryParameters = []): Response
    {
        return $this->client->makeRequest(
            verb: 'POST',
            path: '/apis/authorization.k8s.io/v1/namespaces/{namespace}/localsubjectaccessreviews',
            pathParameters: ['namespace' => $namespace],
            responseClass: LocalSubjectAccessReview::class,
            body: $body,
            queryParameters: $queryParameters,
        );
    }
}
