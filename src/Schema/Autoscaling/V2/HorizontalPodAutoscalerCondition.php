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

class HorizontalPodAutoscalerCondition
{
    /**
     * @param string         $status             status is the status of the condition (True, False, Unknown)
     * @param string         $type               type describes the current condition
     * @param \DateTime|null $lastTransitionTime lastTransitionTime is the last time the condition transitioned from one status to another
     * @param string|null    $message            message is a human-readable explanation containing details about the transition
     * @param string|null    $reason             reason is the reason for the condition's last transition
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?\DateTime $lastTransitionTime = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
