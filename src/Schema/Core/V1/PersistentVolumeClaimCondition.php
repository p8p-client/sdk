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

class PersistentVolumeClaimCondition
{
    /**
     * @param string         $status             Status is the status of the condition. Can be True, False, Unknown. More info: https://kubernetes.io/docs/reference/kubernetes-api/config-and-storage-resources/persistent-volume-claim-v1/#:~:text=state%20of%20pvc-,conditions.status,-(string)%2C%20required
     * @param string         $type               Type is the type of the condition. More info: https://kubernetes.io/docs/reference/kubernetes-api/config-and-storage-resources/persistent-volume-claim-v1/#:~:text=set%20to%20%27ResizeStarted%27.-,PersistentVolumeClaimCondition,-contains%20details%20about
     * @param \DateTime|null $lastProbeTime      lastProbeTime is the time we probed the condition
     * @param \DateTime|null $lastTransitionTime lastTransitionTime is the time the condition transitioned from one status to another
     * @param string|null    $message            message is the human-readable message indicating details about last transition
     * @param string|null    $reason             reason is a unique, this should be a short, machine understandable string that gives the reason for condition's last transition. If it reports "Resizing" that means the underlying persistent volume is being resized.
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?\DateTime $lastProbeTime = null,
        public ?\DateTime $lastTransitionTime = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
