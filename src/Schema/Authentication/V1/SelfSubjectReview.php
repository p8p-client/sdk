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

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.SelfSubjectReview')]
#[K8sSchema(kind: 'SelfSubjectReview', group: 'authentication.k8s.io', version: 'v1')]
class SelfSubjectReview
{
    /**
     * @param ObjectMeta|null              $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param SelfSubjectReviewStatus|null $status   status is filled in by the server with the user attributes
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?SelfSubjectReviewStatus $status = null,
    ) {
    }
}
