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

class MetricStatus
{
    /**
     * @param string                             $type              type is the type of metric source.  It will be one of "ContainerResource", "External", "Object", "Pods" or "Resource", each corresponds to a matching field in the object.
     * @param ContainerResourceMetricStatus|null $containerResource container resource refers to a resource metric (such as those specified in requests and limits) known to Kubernetes describing a single container in each pod in the current scale target (e.g. CPU or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those available to normal per-pod metrics using the "pods" source.
     * @param ExternalMetricStatus|null          $external          external refers to a global metric that is not associated with any Kubernetes object. It allows autoscaling based on information coming from components running outside of cluster (for example length of queue in cloud messaging service, or QPS from loadbalancer running outside of cluster).
     * @param ObjectMetricStatus|null            $object            object refers to a metric describing a single kubernetes object (for example, hits-per-second on an Ingress object)
     * @param PodsMetricStatus|null              $pods              pods refers to a metric describing each pod in the current scale target (for example, transactions-processed-per-second).  The values will be averaged together before being compared to the target value.
     * @param ResourceMetricStatus|null          $resource          resource refers to a resource metric (such as those specified in requests and limits) known to Kubernetes describing each pod in the current scale target (e.g. CPU or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those available to normal per-pod metrics using the "pods" source.
     */
    public function __construct(
        public string $type,
        public ?ContainerResourceMetricStatus $containerResource = null,
        public ?ExternalMetricStatus $external = null,
        public ?ObjectMetricStatus $object = null,
        public ?PodsMetricStatus $pods = null,
        public ?ResourceMetricStatus $resource = null,
    ) {
    }
}
