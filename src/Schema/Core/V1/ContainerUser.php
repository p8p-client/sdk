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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ContainerUser')]
class ContainerUser
{
    /**
     * @param LinuxContainerUser|null $linux Linux holds user identity information initially attached to the first process of the containers in Linux. Note that the actual running identity can be changed if the process has enough privilege to do so.
     */
    public function __construct(
        public ?LinuxContainerUser $linux = null,
    ) {
    }
}
