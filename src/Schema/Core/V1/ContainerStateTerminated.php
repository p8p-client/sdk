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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ContainerStateTerminated')]
class ContainerStateTerminated
{
    /**
     * @param int            $exitCode    Exit status from the last termination of the container
     * @param string|null    $containerID Container's ID in the format '<type>://<container_id>'
     * @param \DateTime|null $finishedAt  Time at which the container last terminated
     * @param string|null    $message     Message regarding the last termination of the container
     * @param string|null    $reason      (brief) reason from the last termination of the container
     * @param int|null       $signal      Signal from the last termination of the container
     * @param \DateTime|null $startedAt   Time at which previous execution of the container started
     */
    public function __construct(
        public int $exitCode,
        public ?string $containerID = null,
        public ?\DateTime $finishedAt = null,
        public ?string $message = null,
        public ?string $reason = null,
        public ?int $signal = null,
        public ?\DateTime $startedAt = null,
    ) {
    }
}
