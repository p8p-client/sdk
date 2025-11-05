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
use P8p\Sdk\Schema\Meta\V1\LabelSelector;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.CSIStorageCapacity')]
#[K8sSchema(kind: 'CSIStorageCapacity', group: 'storage.k8s.io', version: 'v1')]
class CSIStorageCapacity
{
    /**
     * @param string            $storageClassName storageClassName represents the name of the StorageClass that the reported capacity applies to. It must meet the same requirements as the name of a StorageClass object (non-empty, DNS subdomain). If that object no longer exists, the CSIStorageCapacity object is obsolete and should be removed by its creator. This field is immutable.
     * @param float|string|null $capacity         capacity is the value reported by the CSI driver in its GetCapacityResponse for a GetCapacityRequest with topology and parameters that match the previous fields.
     *
     * The semantic is currently (CSI spec 1.2) defined as: The available capacity, in bytes, of the storage that can be used to provision volumes. If not set, that information is currently unavailable.
     * @param float|string|null $maximumVolumeSize maximumVolumeSize is the value reported by the CSI driver in its GetCapacityResponse for a GetCapacityRequest with topology and parameters that match the previous fields.
     *
     * This is defined since CSI spec 1.4.0 as the largest size that may be used in a CreateVolumeRequest.capacity_range.required_bytes field to create a volume with the same parameters as those in GetCapacityRequest. The corresponding value in the Kubernetes API is ResourceRequirements.Requests in a volume claim.
     * @param ObjectMeta|null $metadata Standard object's metadata. The name has no particular meaning. It must be a DNS subdomain (dots allowed, 253 characters). To ensure that there are no conflicts with other CSI drivers on the cluster, the recommendation is to use csisc-<uuid>, a generated name, or a reverse-domain name which ends with the unique CSI driver name.
     *
     * Objects are namespaced.
     *
     * More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param LabelSelector|null $nodeTopology nodeTopology defines which nodes have access to the storage for which capacity was reported. If not set, the storage is not accessible from any node in the cluster. If empty, the storage is accessible from all nodes. This field is immutable.
     */
    public function __construct(
        public string $storageClassName,
        public float|string|null $capacity = null,
        public float|string|null $maximumVolumeSize = null,
        public ?ObjectMeta $metadata = null,
        public ?LabelSelector $nodeTopology = null,
    ) {
    }
}
