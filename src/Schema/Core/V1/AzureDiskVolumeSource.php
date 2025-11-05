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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.AzureDiskVolumeSource')]
class AzureDiskVolumeSource
{
    /**
     * @param string      $diskName    diskName is the Name of the data disk in the blob storage
     * @param string      $diskURI     diskURI is the URI of data disk in the blob storage
     * @param string|null $cachingMode cachingMode is the Host Caching mode: None, Read Only, Read Write.
     *
     * Possible enum values:
     *  - `"None"`
     *  - `"ReadOnly"`
     *  - `"ReadWrite"`
     * @param string|null $fsType fsType is Filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     * @param string|null $kind   kind expected values are Shared: multiple blob disks per storage account  Dedicated: single blob disk per storage account  Managed: azure managed data disk (only in managed availability set). defaults to shared
     *
     * Possible enum values:
     *  - `"Dedicated"`
     *  - `"Managed"`
     *  - `"Shared"`
     * @param bool|null $readOnly readOnly Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     */
    public function __construct(
        public string $diskName,
        public string $diskURI,
        public ?string $cachingMode = null,
        public ?string $fsType = null,
        public ?string $kind = null,
        public ?bool $readOnly = null,
    ) {
    }
}
