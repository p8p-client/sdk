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

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.HorizontalPodAutoscalerStatus')]
class HorizontalPodAutoscalerStatus
{
    /**
     * @param int                                               $desiredReplicas    desiredReplicas is the desired number of replicas of pods managed by this autoscaler, as last calculated by the autoscaler
     * @param array<int, HorizontalPodAutoscalerCondition>|null $conditions         conditions is the set of conditions required for this autoscaler to scale its target, and indicates whether or not those conditions are met
     * @param array<int, MetricStatus>|null                     $currentMetrics     currentMetrics is the last read state of the metrics used by this autoscaler
     * @param int|null                                          $currentReplicas    currentReplicas is current number of replicas of pods managed by this autoscaler, as last seen by the autoscaler
     * @param \DateTime|null                                    $lastScaleTime      lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods, used by the autoscaler to control how often the number of pods is changed
     * @param int|null                                          $observedGeneration observedGeneration is the most recent generation observed by this autoscaler
     */
    public function __construct(
        public int $desiredReplicas,
        public ?array $conditions = null,
        public ?array $currentMetrics = null,
        public ?int $currentReplicas = null,
        public ?\DateTime $lastScaleTime = null,
        public ?int $observedGeneration = null,
    ) {
    }
}
