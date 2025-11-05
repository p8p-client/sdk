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

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.HorizontalPodAutoscalerBehavior')]
class HorizontalPodAutoscalerBehavior
{
    /**
     * @param HPAScalingRules|null $scaleDown scaleDown is scaling policy for scaling Down. If not set, the default value is to allow to scale down to minReplicas pods, with a 300 second stabilization window (i.e., the highest recommendation for the last 300sec is used).
     * @param HPAScalingRules|null $scaleUp   scaleUp is scaling policy for scaling Up. If not set, the default value is the higher of:
     *                                        * increase no more than 4 pods per 60 seconds
     *                                        * double the number of pods per 60 seconds
     *                                        No stabilization is used.
     */
    public function __construct(
        public ?HPAScalingRules $scaleDown = null,
        public ?HPAScalingRules $scaleUp = null,
    ) {
    }
}
