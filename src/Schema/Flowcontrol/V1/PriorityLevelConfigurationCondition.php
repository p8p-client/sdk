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

namespace P8p\Sdk\Schema\Flowcontrol\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.PriorityLevelConfigurationCondition')]
class PriorityLevelConfigurationCondition
{
    /**
     * @param \DateTime|null $lastTransitionTime `lastTransitionTime` is the last time the condition transitioned from one status to another
     * @param string|null    $message            `message` is a human-readable message indicating details about last transition
     * @param string|null    $reason             `reason` is a unique, one-word, CamelCase reason for the condition's last transition
     * @param string|null    $status             `status` is the status of the condition. Can be True, False, Unknown. Required.
     * @param string|null    $type               `type` is the type of the condition. Required.
     */
    public function __construct(
        public ?\DateTime $lastTransitionTime = null,
        public ?string $message = null,
        public ?string $reason = null,
        public ?string $status = null,
        public ?string $type = null,
    ) {
    }
}
