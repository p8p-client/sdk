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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.VolumeDevice')]
class VolumeDevice
{
    /**
     * @param string $devicePath devicePath is the path inside of the container that the device will be mapped to
     * @param string $name       name must match the name of a persistentVolumeClaim in the pod
     */
    public function __construct(
        public string $devicePath,
        public string $name,
    ) {
    }
}
