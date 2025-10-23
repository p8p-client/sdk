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

namespace P8p\Sdk\Schema\Meta\V1;

class StatusDetails
{
    /**
     * @param array<int, StatusCause>|null $causes            The Causes array includes more details associated with the StatusReason failure. Not all StatusReasons may provide detailed causes.
     * @param string|null                  $group             the group attribute of the resource associated with the status StatusReason
     * @param string|null                  $kind              The kind attribute of the resource associated with the status StatusReason. On some operations may differ from the requested resource Kind. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     * @param string|null                  $name              the name attribute of the resource associated with the status StatusReason (when there is a single name which can be described)
     * @param int|null                     $retryAfterSeconds If specified, the time in seconds before the operation should be retried. Some errors may indicate the client must take an alternate action - for those errors this field may indicate how long to wait before taking the alternate action.
     * @param string|null                  $uid               UID of the resource. (when there is a single resource which can be described). More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function __construct(
        public ?array $causes = null,
        public ?string $group = null,
        public ?string $kind = null,
        public ?string $name = null,
        public ?int $retryAfterSeconds = null,
        public ?string $uid = null,
    ) {
    }
}
