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
use P8p\Sdk\Schema\Core\V1\ObjectReference;

#[K8sSchemaRef(name: 'io.k8s.api.batch.v1.CronJobStatus')]
class CronJobStatus
{
    /**
     * @param array<int, ObjectReference>|null $active             a list of pointers to currently running jobs
     * @param \DateTime|null                   $lastScheduleTime   information when was the last time the job was successfully scheduled
     * @param \DateTime|null                   $lastSuccessfulTime information when was the last time the job successfully completed
     */
    public function __construct(
        public ?array $active = null,
        public ?\DateTime $lastScheduleTime = null,
        public ?\DateTime $lastSuccessfulTime = null,
    ) {
    }
}
