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

namespace P8p\Sdk\Schema\Apps\V1;

class ReplicaSetCondition
{
    /**
     * @param string         $status             status of the condition, one of True, False, Unknown
     * @param string         $type               type of replica set condition
     * @param \DateTime|null $lastTransitionTime the last time the condition transitioned from one status to another
     * @param string|null    $message            a human readable message indicating details about the transition
     * @param string|null    $reason             the reason for the condition's last transition
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
