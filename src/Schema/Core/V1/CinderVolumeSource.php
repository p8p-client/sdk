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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.CinderVolumeSource')]
class CinderVolumeSource
{
    /**
     * @param string                    $volumeID  volumeID used to identify the volume in cinder. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     * @param string|null               $fsType    fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     * @param bool|null                 $readOnly  readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     * @param LocalObjectReference|null $secretRef secretRef is optional: points to a secret object containing parameters used to connect to OpenStack
     */
    public function __construct(
        public string $volumeID,
        public ?string $fsType = null,
        public ?bool $readOnly = null,
        public ?LocalObjectReference $secretRef = null,
    ) {
    }
}
