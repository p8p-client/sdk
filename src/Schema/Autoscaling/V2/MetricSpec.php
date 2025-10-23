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

class MetricSpec
{
    /**
     * @param string                             $type              type is the type of metric source.  It should be one of "ContainerResource", "External", "Object", "Pods" or "Resource", each mapping to a matching field in the object.
     * @param ContainerResourceMetricSource|null $containerResource containerResource refers to a resource metric (such as those specified in requests and limits) known to Kubernetes describing a single container in each pod of the current scale target (e.g. CPU or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those available to normal per-pod metrics using the "pods" source.
     * @param ExternalMetricSource|null          $external          external refers to a global metric that is not associated with any Kubernetes object. It allows autoscaling based on information coming from components running outside of cluster (for example length of queue in cloud messaging service, or QPS from loadbalancer running outside of cluster).
     * @param ObjectMetricSource|null            $object            object refers to a metric describing a single kubernetes object (for example, hits-per-second on an Ingress object)
     * @param PodsMetricSource|null              $pods              pods refers to a metric describing each pod in the current scale target (for example, transactions-processed-per-second).  The values will be averaged together before being compared to the target value.
     * @param ResourceMetricSource|null          $resource          resource refers to a resource metric (such as those specified in requests and limits) known to Kubernetes describing each pod in the current scale target (e.g. CPU or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those available to normal per-pod metrics using the "pods" source.
     */
    public function __construct(
        public string $type,
        public ?ContainerResourceMetricSource $containerResource = null,
        public ?ExternalMetricSource $external = null,
        public ?ObjectMetricSource $object = null,
        public ?PodsMetricSource $pods = null,
        public ?ResourceMetricSource $resource = null,
    ) {
    }
}
