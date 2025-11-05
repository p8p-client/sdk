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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.StorageOSPersistentVolumeSource')]
class StorageOSPersistentVolumeSource
{
    /**
     * @param string|null          $fsType          fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     * @param bool|null            $readOnly        readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     * @param ObjectReference|null $secretRef       secretRef specifies the secret to use for obtaining the StorageOS API credentials.  If not specified, default values will be attempted.
     * @param string|null          $volumeName      volumeName is the human-readable name of the StorageOS volume.  Volume names are only unique within a namespace.
     * @param string|null          $volumeNamespace volumeNamespace specifies the scope of the volume within StorageOS.  If no namespace is specified then the Pod's namespace will be used.  This allows the Kubernetes name scoping to be mirrored within StorageOS for tighter integration. Set VolumeName to any name to override the default behaviour. Set to "default" if you are not using namespaces within StorageOS. Namespaces that do not pre-exist within StorageOS will be created.
     */
    public function __construct(
        public ?string $fsType = null,
        public ?bool $readOnly = null,
        public ?ObjectReference $secretRef = null,
        public ?string $volumeName = null,
        public ?string $volumeNamespace = null,
    ) {
    }
}
