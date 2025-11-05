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

namespace P8p\Sdk\Schema\Authorization\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.authorization.v1.LocalSubjectAccessReview')]
#[K8sSchema(kind: 'LocalSubjectAccessReview', group: 'authorization.k8s.io', version: 'v1')]
class LocalSubjectAccessReview
{
    /**
     * @param SubjectAccessReviewSpec        $spec     Spec holds information about the request being evaluated.  spec.namespace must be equal to the namespace you made the request against.  If empty, it is defaulted.
     * @param ObjectMeta|null                $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param SubjectAccessReviewStatus|null $status   Status is filled in by the server and indicates whether the request is allowed or not
     */
    public function __construct(
        public SubjectAccessReviewSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?SubjectAccessReviewStatus $status = null,
    ) {
    }
}
