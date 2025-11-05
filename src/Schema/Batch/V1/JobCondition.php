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

namespace P8p\Sdk\Schema\Batch\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.batch.v1.JobCondition')]
class JobCondition
{
    /**
     * @param string         $status             status of the condition, one of True, False, Unknown
     * @param string         $type               type of job condition, Complete or Failed
     * @param \DateTime|null $lastProbeTime      last time the condition was checked
     * @param \DateTime|null $lastTransitionTime last time the condition transit from one status to another
     * @param string|null    $message            human readable message indicating details about last transition
     * @param string|null    $reason             (brief) reason for the condition's last transition
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
