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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PortworxVolumeSource')]
class PortworxVolumeSource
{
    /**
     * @param string      $volumeID volumeID uniquely identifies a Portworx volume
     * @param string|null $fsType   fSType represents the filesystem type to mount Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs". Implicitly inferred to be "ext4" if unspecified.
     * @param bool|null   $readOnly readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     */
    public function __construct(
        public string $volumeID,
        public ?string $fsType = null,
        public ?bool $readOnly = null,
    ) {
    }
}
