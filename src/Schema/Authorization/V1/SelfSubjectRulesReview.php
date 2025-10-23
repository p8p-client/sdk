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
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'SelfSubjectRulesReview', apiVersion: 'v1')]
class SelfSubjectRulesReview
{
    /**
     * @param SelfSubjectRulesReviewSpec    $spec     spec holds information about the request being evaluated
     * @param ObjectMeta|null               $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param SubjectRulesReviewStatus|null $status   status is filled in by the server and indicates the set of actions a user can perform
     */
    public function __construct(
        public SelfSubjectRulesReviewSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?SubjectRulesReviewStatus $status = null,
    ) {
    }
}
