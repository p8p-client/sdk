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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.MetricValueStatus')]
class MetricValueStatus
{
    /**
     * @param int|null          $averageUtilization currentAverageUtilization is the current value of the average of the resource metric across all relevant pods, represented as a percentage of the requested value of the resource for the pods
     * @param float|string|null $averageValue       averageValue is the current value of the average of the metric across all relevant pods (as a quantity)
     * @param float|string|null $value              value is the current value of the metric (as a quantity)
     */
    public function __construct(
        public ?int $averageUtilization = null,
        public float|string|null $averageValue = null,
        public float|string|null $value = null,
    ) {
    }
}
