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

class HPAScalingRules
{
    /**
     * @param array<int, HPAScalingPolicy>|null $policies                   policies is a list of potential scaling polices which can be used during scaling. At least one policy must be specified, otherwise the HPAScalingRules will be discarded as invalid
     * @param string|null                       $selectPolicy               selectPolicy is used to specify which policy should be used. If not set, the default value Max is used.
     * @param int|null                          $stabilizationWindowSeconds stabilizationWindowSeconds is the number of seconds for which past recommendations should be considered while scaling up or scaling down. StabilizationWindowSeconds must be greater than or equal to zero and less than or equal to 3600 (one hour). If not set, use the default values: - For scale up: 0 (i.e. no stabilization is done). - For scale down: 300 (i.e. the stabilization window is 300 seconds long).
     */
    public function __construct(
        public ?array $policies = null,
        public ?string $selectPolicy = null,
        public ?int $stabilizationWindowSeconds = null,
    ) {
    }
}
