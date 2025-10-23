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

namespace P8p\Sdk\Schema\Flowcontrol\V1;

class PriorityLevelConfigurationStatus
{
    /**
     * @param array<int, PriorityLevelConfigurationCondition>|null $conditions `conditions` is the current state of "request-priority"
     */
    public function __construct(
        public ?array $conditions = null,
    ) {
    }
}
