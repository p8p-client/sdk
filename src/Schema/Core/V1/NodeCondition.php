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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeCondition')]
class NodeCondition
{
    /**
     * @param string         $status             status of the condition, one of True, False, Unknown
     * @param string         $type               type of node condition
     * @param \DateTime|null $lastHeartbeatTime  last time we got an update on a given condition
     * @param \DateTime|null $lastTransitionTime last time the condition transit from one status to another
     * @param string|null    $message            human readable message indicating details about last transition
     * @param string|null    $reason             (brief) reason for the condition's last transition
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?\DateTime $lastHeartbeatTime = null,
        public ?\DateTime $lastTransitionTime = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
