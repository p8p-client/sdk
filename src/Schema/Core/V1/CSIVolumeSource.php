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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.CSIVolumeSource')]
class CSIVolumeSource
{
    /**
     * @param string                    $driver               driver is the name of the CSI driver that handles this volume. Consult with your admin for the correct name as registered in the cluster.
     * @param string|null               $fsType               fsType to mount. Ex. "ext4", "xfs", "ntfs". If not provided, the empty value is passed to the associated CSI driver which will determine the default filesystem to apply.
     * @param LocalObjectReference|null $nodePublishSecretRef nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is optional, and  may be empty if no secret is required. If the secret object contains more than one secret, all secret references are passed.
     * @param bool|null                 $readOnly             readOnly specifies a read-only configuration for the volume. Defaults to false (read/write).
     * @param array<mixed>|null         $volumeAttributes     volumeAttributes stores driver-specific properties that are passed to the CSI driver. Consult your driver's documentation for supported values.
     */
    public function __construct(
        public string $driver,
        public ?string $fsType = null,
        public ?LocalObjectReference $nodePublishSecretRef = null,
        public ?bool $readOnly = null,
        public ?array $volumeAttributes = null,
    ) {
    }
}
