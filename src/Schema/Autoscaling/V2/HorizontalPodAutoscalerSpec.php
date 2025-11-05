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

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.HorizontalPodAutoscalerSpec')]
class HorizontalPodAutoscalerSpec
{
    /**
     * @param int                                  $maxReplicas    maxReplicas is the upper limit for the number of replicas to which the autoscaler can scale up. It cannot be less that minReplicas.
     * @param CrossVersionObjectReference          $scaleTargetRef scaleTargetRef points to the target resource to scale, and is used to the pods for which metrics should be collected, as well as to actually change the replica count
     * @param HorizontalPodAutoscalerBehavior|null $behavior       behavior configures the scaling behavior of the target in both Up and Down directions (scaleUp and scaleDown fields respectively). If not set, the default HPAScalingRules for scale up and scale down are used.
     * @param array<int, MetricSpec>|null          $metrics        metrics contains the specifications for which to use to calculate the desired replica count (the maximum replica count across all metrics will be used).  The desired replica count is calculated multiplying the ratio between the target value and the current value by the current number of pods.  Ergo, metrics used must decrease as the pod count is increased, and vice-versa.  See the individual metric source types for more information about how each type of metric must respond. If not set, the default metric will be set to 80% average CPU utilization.
     * @param int|null                             $minReplicas    minReplicas is the lower limit for the number of replicas to which the autoscaler can scale down.  It defaults to 1 pod.  minReplicas is allowed to be 0 if the alpha feature gate HPAScaleToZero is enabled and at least one Object or External metric is configured.  Scaling is active as long as at least one metric value is available.
     */
    public function __construct(
        public int $maxReplicas,
        public CrossVersionObjectReference $scaleTargetRef,
        public ?HorizontalPodAutoscalerBehavior $behavior = null,
        public ?array $metrics = null,
        public ?int $minReplicas = null,
    ) {
    }
}
