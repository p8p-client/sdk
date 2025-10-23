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

class HorizontalPodAutoscalerSpec
{
    /**
     * @param int                         $maxReplicas                    maxReplicas is the upper limit for the number of pods that can be set by the autoscaler; cannot be smaller than MinReplicas
     * @param CrossVersionObjectReference $scaleTargetRef                 reference to scaled resource; horizontal pod autoscaler will learn the current resource consumption and will set the desired number of pods by using its Scale subresource
     * @param int|null                    $minReplicas                    minReplicas is the lower limit for the number of replicas to which the autoscaler can scale down.  It defaults to 1 pod.  minReplicas is allowed to be 0 if the alpha feature gate HPAScaleToZero is enabled and at least one Object or External metric is configured.  Scaling is active as long as at least one metric value is available.
     * @param int|null                    $targetCPUUtilizationPercentage targetCPUUtilizationPercentage is the target average CPU utilization (represented as a percentage of requested CPU) over all the pods; if not specified the default autoscaling policy will be used
     */
    public function __construct(
        public int $maxReplicas,
        public CrossVersionObjectReference $scaleTargetRef,
        public ?int $minReplicas = null,
        public ?int $targetCPUUtilizationPercentage = null,
    ) {
    }
}
