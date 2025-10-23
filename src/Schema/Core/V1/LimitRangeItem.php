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

namespace P8p\Sdk\Schema\Core\V1;

class LimitRangeItem
{
    /**
     * @param string            $type                 type of resource that this limit applies to
     * @param array<mixed>|null $default              default resource requirement limit value by resource name if resource limit is omitted
     * @param array<mixed>|null $defaultRequest       defaultRequest is the default resource requirement request value by resource name if resource request is omitted
     * @param array<mixed>|null $max                  max usage constraints on this kind by resource name
     * @param array<mixed>|null $maxLimitRequestRatio maxLimitRequestRatio if specified, the named resource must have a request and limit that are both non-zero where limit divided by request is less than or equal to the enumerated value; this represents the max burst for the named resource
     * @param array<mixed>|null $min                  min usage constraints on this kind by resource name
     */
    public function __construct(
        public string $type,
        public ?array $default = null,
        public ?array $defaultRequest = null,
        public ?array $max = null,
        public ?array $maxLimitRequestRatio = null,
        public ?array $min = null,
    ) {
    }
}
