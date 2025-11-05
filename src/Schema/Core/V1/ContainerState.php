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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ContainerState')]
class ContainerState
{
    /**
     * @param ContainerStateRunning|null    $running    Details about a running container
     * @param ContainerStateTerminated|null $terminated Details about a terminated container
     * @param ContainerStateWaiting|null    $waiting    Details about a waiting container
     */
    public function __construct(
        public ?ContainerStateRunning $running = null,
        public ?ContainerStateTerminated $terminated = null,
        public ?ContainerStateWaiting $waiting = null,
    ) {
    }
}
