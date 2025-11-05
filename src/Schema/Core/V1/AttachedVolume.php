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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.AttachedVolume')]
class AttachedVolume
{
    /**
     * @param string $devicePath DevicePath represents the device path where the volume should be available
     * @param string $name       Name of the attached volume
     */
    public function __construct(
        public string $devicePath,
        public string $name,
    ) {
    }
}
