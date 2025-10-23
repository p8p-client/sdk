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

class MetricTarget
{
    /**
     * @param string            $type               type represents whether the metric type is Utilization, Value, or AverageValue
     * @param int|null          $averageUtilization averageUtilization is the target value of the average of the resource metric across all relevant pods, represented as a percentage of the requested value of the resource for the pods. Currently only valid for Resource metric source type
     * @param float|string|null $averageValue       averageValue is the target value of the average of the metric across all relevant pods (as a quantity)
     * @param float|string|null $value              value is the target value of the metric (as a quantity)
     */
    public function __construct(
        public string $type,
        public ?int $averageUtilization = null,
        public float|string|null $averageValue = null,
        public float|string|null $value = null,
    ) {
    }
}
