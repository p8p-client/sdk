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

namespace P8p\Sdk\Schema\Storage\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\TopologySelectorTerm;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.StorageClass')]
#[K8sSchema(kind: 'StorageClass', group: 'storage.k8s.io', version: 'v1')]
class StorageClass
{
    /**
     * @param string                                $provisioner          provisioner indicates the type of the provisioner
     * @param bool|null                             $allowVolumeExpansion allowVolumeExpansion shows whether the storage class allow volume expand
     * @param array<int, TopologySelectorTerm>|null $allowedTopologies    allowedTopologies restrict the node topologies where volumes can be dynamically provisioned. Each volume plugin defines its own supported topology specifications. An empty TopologySelectorTerm list means there is no topology restriction. This field is only honored by servers that enable the VolumeScheduling feature.
     * @param ObjectMeta|null                       $metadata             Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param array<int, string>|null               $mountOptions         mountOptions controls the mountOptions for dynamically provisioned PersistentVolumes of this storage class. e.g. ["ro", "soft"]. Not validated - mount of the PVs will simply fail if one is invalid.
     * @param array<mixed>|null                     $parameters           parameters holds the parameters for the provisioner that should create volumes of this storage class
     * @param string|null                           $reclaimPolicy        reclaimPolicy controls the reclaimPolicy for dynamically provisioned PersistentVolumes of this storage class. Defaults to Delete.
     *
     * Possible enum values:
     *  - `"Delete"` means the volume will be deleted from Kubernetes on release from its claim. The volume plugin must support Deletion.
     *  - `"Recycle"` means the volume will be recycled back into the pool of unbound persistent volumes on release from its claim. The volume plugin must support Recycling.
     *  - `"Retain"` means the volume will be left in its current phase (Released) for manual reclamation by the administrator. The default policy is Retain.
     * @param string|null $volumeBindingMode volumeBindingMode indicates how PersistentVolumeClaims should be provisioned and bound.  When unset, VolumeBindingImmediate is used. This field is only honored by servers that enable the VolumeScheduling feature.
     *
     * Possible enum values:
     *  - `"Immediate"` indicates that PersistentVolumeClaims should be immediately provisioned and bound. This is the default mode.
     *  - `"WaitForFirstConsumer"` indicates that PersistentVolumeClaims should not be provisioned and bound until the first Pod is created that references the PeristentVolumeClaim. The volume provisioning and binding will occur during Pod scheduing.
     */
    public function __construct(
        public string $provisioner,
        public ?bool $allowVolumeExpansion = null,
        public ?array $allowedTopologies = null,
        public ?ObjectMeta $metadata = null,
        public ?array $mountOptions = null,
        public ?array $parameters = null,
        public ?string $reclaimPolicy = null,
        public ?string $volumeBindingMode = null,
    ) {
    }
}
