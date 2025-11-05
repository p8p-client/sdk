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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.LocalVolumeSource')]
class LocalVolumeSource
{
    /**
     * @param string      $path   path of the full path to the volume on the node. It can be either a directory or block device (disk, partition, ...).
     * @param string|null $fsType fsType is the filesystem type to mount. It applies only when the Path is a block device. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". The default value is to auto-select a filesystem if unspecified.
     */
    public function __construct(
        public string $path,
        public ?string $fsType = null,
    ) {
    }
}
