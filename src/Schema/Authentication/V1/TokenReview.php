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

namespace P8p\Sdk\Schema\Authentication\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.TokenReview')]
#[K8sSchema(kind: 'TokenReview', group: 'authentication.k8s.io', version: 'v1')]
class TokenReview
{
    /**
     * @param TokenReviewSpec        $spec     Spec holds information about the request being evaluated
     * @param ObjectMeta|null        $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param TokenReviewStatus|null $status   status is filled in by the server and indicates whether the request can be authenticated
     */
    public function __construct(
        public TokenReviewSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?TokenReviewStatus $status = null,
    ) {
    }
}
