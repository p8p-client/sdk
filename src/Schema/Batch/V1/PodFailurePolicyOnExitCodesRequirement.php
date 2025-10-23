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

namespace P8p\Sdk\Schema\Batch\V1;

class PodFailurePolicyOnExitCodesRequirement
{
    /**
     * @param string $operator Represents the relationship between the container exit code(s) and the specified values. Containers completed with success (exit code 0) are excluded from the requirement check. Possible values are:
     *
     * - In: the requirement is satisfied if at least one container exit code
     *   (might be multiple if there are multiple containers not restricted
     *   by the 'containerName' field) is in the set of specified values.
     * - NotIn: the requirement is satisfied if at least one container exit code
     *   (might be multiple if there are multiple containers not restricted
     *   by the 'containerName' field) is not in the set of specified values.
     * Additional values are considered to be added in the future. Clients should react to an unknown operator by assuming the requirement is not satisfied.
     *
     * Possible enum values:
     *  - `"In"`
     *  - `"NotIn"`
     * @param array<int, int> $values        Specifies the set of values. Each returned container exit code (might be multiple in case of multiple containers) is checked against this set of values with respect to the operator. The list of values must be ordered and must not contain duplicates. Value '0' cannot be used for the In operator. At least one element is required. At most 255 elements are allowed.
     * @param string|null     $containerName Restricts the check for exit codes to the container with the specified name. When null, the rule applies to all containers. When specified, it should match one the container or initContainer names in the pod template.
     */
    public function __construct(
        public string $operator,
        public array $values,
        public ?string $containerName = null,
    ) {
    }
}
