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

namespace P8p\Sdk\Schema\Core\V1;

class Taint
{
    /**
     * @param string $effect Required. The effect of the taint on pods that do not tolerate the taint. Valid effects are NoSchedule, PreferNoSchedule and NoExecute.
     *
     * Possible enum values:
     *  - `"NoExecute"` Evict any already-running pods that do not tolerate the taint. Currently enforced by NodeController.
     *  - `"NoSchedule"` Do not allow new pods to schedule onto the node unless they tolerate the taint, but allow all pods submitted to Kubelet without going through the scheduler to start, and allow all already-running pods to continue running. Enforced by the scheduler.
     *  - `"PreferNoSchedule"` Like TaintEffectNoSchedule, but the scheduler tries not to schedule new pods onto the node, rather than prohibiting new pods from scheduling onto the node entirely. Enforced by the scheduler.
     * @param string         $key       Required. The taint key to be applied to a node.
     * @param \DateTime|null $timeAdded TimeAdded represents the time at which the taint was added. It is only written for NoExecute taints.
     * @param string|null    $value     the taint value corresponding to the taint key
     */
    public function __construct(
        public string $effect,
        public string $key,
        public ?\DateTime $timeAdded = null,
        public ?string $value = null,
    ) {
    }
}
