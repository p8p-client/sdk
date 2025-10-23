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

class LimitRangeSpec
{
    /**
     * @param array<int, LimitRangeItem> $limits limits is the list of LimitRangeItem objects that are enforced
     */
    public function __construct(
        public array $limits,
    ) {
    }
}
