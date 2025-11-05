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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.authorization.v1.SubjectAccessReviewStatus')]
class SubjectAccessReviewStatus
{
    /**
     * @param bool        $allowed         Allowed is required. True if the action would be allowed, false otherwise.
     * @param bool|null   $denied          Denied is optional. True if the action would be denied, otherwise false. If both allowed is false and denied is false, then the authorizer has no opinion on whether to authorize the action. Denied may not be true if Allowed is true.
     * @param string|null $evaluationError EvaluationError is an indication that some error occurred during the authorization check. It is entirely possible to get an error and be able to continue determine authorization status in spite of it. For instance, RBAC can be missing a role, but enough roles are still present and bound to reason about the request.
     * @param string|null $reason          Reason is optional.  It indicates why a request was allowed or denied.
     */
    public function __construct(
        public bool $allowed,
        public ?bool $denied = null,
        public ?string $evaluationError = null,
        public ?string $reason = null,
    ) {
    }
}
