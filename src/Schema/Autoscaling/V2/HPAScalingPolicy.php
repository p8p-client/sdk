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

namespace P8p\Sdk\Schema\Autoscaling\V2;

class HPAScalingPolicy
{
    /**
     * @param int    $periodSeconds periodSeconds specifies the window of time for which the policy should hold true. PeriodSeconds must be greater than zero and less than or equal to 1800 (30 min).
     * @param string $type          type is used to specify the scaling policy
     * @param int    $value         value contains the amount of change which is permitted by the policy. It must be greater than zero
     */
    public function __construct(
        public int $periodSeconds,
        public string $type,
        public int $value,
    ) {
    }
}
