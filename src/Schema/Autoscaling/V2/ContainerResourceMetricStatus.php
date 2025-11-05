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

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.ContainerResourceMetricStatus')]
class ContainerResourceMetricStatus
{
    /**
     * @param string            $container container is the name of the container in the pods of the scaling target
     * @param MetricValueStatus $current   current contains the current value for the given metric
     * @param string            $name      name is the name of the resource in question
     */
    public function __construct(
        public string $container,
        public MetricValueStatus $current,
        public string $name,
    ) {
    }
}
