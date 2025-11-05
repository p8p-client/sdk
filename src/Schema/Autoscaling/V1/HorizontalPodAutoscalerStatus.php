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

namespace P8p\Sdk\Schema\Autoscaling\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v1.HorizontalPodAutoscalerStatus')]
class HorizontalPodAutoscalerStatus
{
    /**
     * @param int            $currentReplicas                 currentReplicas is the current number of replicas of pods managed by this autoscaler
     * @param int            $desiredReplicas                 desiredReplicas is the  desired number of replicas of pods managed by this autoscaler
     * @param int|null       $currentCPUUtilizationPercentage currentCPUUtilizationPercentage is the current average CPU utilization over all pods, represented as a percentage of requested CPU, e.g. 70 means that an average pod is using now 70% of its requested CPU.
     * @param \DateTime|null $lastScaleTime                   lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods; used by the autoscaler to control how often the number of pods is changed
     * @param int|null       $observedGeneration              observedGeneration is the most recent generation observed by this autoscaler
     */
    public function __construct(
        public int $currentReplicas,
        public int $desiredReplicas,
        public ?int $currentCPUUtilizationPercentage = null,
        public ?\DateTime $lastScaleTime = null,
        public ?int $observedGeneration = null,
    ) {
    }
}
