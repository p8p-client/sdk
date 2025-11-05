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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.CSIPersistentVolumeSource')]
class CSIPersistentVolumeSource
{
    /**
     * @param string               $driver                     driver is the name of the driver to use for this volume. Required.
     * @param string               $volumeHandle               volumeHandle is the unique volume name returned by the CSI volume plugin’s CreateVolume to refer to the volume on all subsequent calls. Required.
     * @param SecretReference|null $controllerExpandSecretRef  controllerExpandSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI ControllerExpandVolume call. This field is optional, and may be empty if no secret is required. If the secret object contains more than one secret, all secrets are passed.
     * @param SecretReference|null $controllerPublishSecretRef controllerPublishSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI ControllerPublishVolume and ControllerUnpublishVolume calls. This field is optional, and may be empty if no secret is required. If the secret object contains more than one secret, all secrets are passed.
     * @param string|null          $fsType                     fsType to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs".
     * @param SecretReference|null $nodeExpandSecretRef        nodeExpandSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI NodeExpandVolume call. This field is optional, may be omitted if no secret is required. If the secret object contains more than one secret, all secrets are passed.
     * @param SecretReference|null $nodePublishSecretRef       nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is optional, and may be empty if no secret is required. If the secret object contains more than one secret, all secrets are passed.
     * @param SecretReference|null $nodeStageSecretRef         nodeStageSecretRef is a reference to the secret object containing sensitive information to pass to the CSI driver to complete the CSI NodeStageVolume and NodeStageVolume and NodeUnstageVolume calls. This field is optional, and may be empty if no secret is required. If the secret object contains more than one secret, all secrets are passed.
     * @param bool|null            $readOnly                   readOnly value to pass to ControllerPublishVolumeRequest. Defaults to false (read/write).
     * @param array<mixed>|null    $volumeAttributes           volumeAttributes of the volume to publish
     */
    public function __construct(
        public string $driver,
        public string $volumeHandle,
        public ?SecretReference $controllerExpandSecretRef = null,
        public ?SecretReference $controllerPublishSecretRef = null,
        public ?string $fsType = null,
        public ?SecretReference $nodeExpandSecretRef = null,
        public ?SecretReference $nodePublishSecretRef = null,
        public ?SecretReference $nodeStageSecretRef = null,
        public ?bool $readOnly = null,
        public ?array $volumeAttributes = null,
    ) {
    }
}
