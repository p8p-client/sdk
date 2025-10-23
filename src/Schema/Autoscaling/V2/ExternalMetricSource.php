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

class ExternalMetricSource
{
    /**
     * @param MetricIdentifier $metric metric identifies the target metric by name and selector
     * @param MetricTarget     $target target specifies the target value for the given metric
     */
    public function __construct(
        public MetricIdentifier $metric,
        public MetricTarget $target,
    ) {
    }
}
