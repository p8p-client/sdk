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
use P8p\Sdk\Schema\Core\V1\LabelSelector;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.MetricIdentifier')]
class MetricIdentifier
{
    /**
     * @param string             $name     name is the name of the given metric
     * @param LabelSelector|null $selector selector is the string-encoded form of a standard kubernetes label selector for the given metric When set, it is passed as an additional parameter to the metrics server for more specific metrics scoping. When unset, just the metricName will be used to gather metrics.
     */
    public function __construct(
        public string $name,
        public ?LabelSelector $selector = null,
    ) {
    }
}
