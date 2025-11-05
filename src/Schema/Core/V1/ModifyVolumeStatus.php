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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ModifyVolumeStatus')]
class ModifyVolumeStatus
{
    /**
     * @param string $status status is the status of the ControllerModifyVolume operation. It can be in any of following states:
     *                       - Pending
     *                       Pending indicates that the PersistentVolumeClaim cannot be modified due to unmet requirements, such as
     *                       the specified VolumeAttributesClass not existing.
     *                       - InProgress
     *                       InProgress indicates that the volume is being modified.
     *                       - Infeasible
     *                       Infeasible indicates that the request has been rejected as invalid by the CSI driver. To
     *                       resolve the error, a valid VolumeAttributesClass needs to be specified.
     *                       Note: New statuses can be added in the future. Consumers should check for unknown statuses and fail appropriately.
     *
     * Possible enum values:
     *  - `"InProgress"` InProgress indicates that the volume is being modified
     *  - `"Infeasible"` Infeasible indicates that the request has been rejected as invalid by the CSI driver. To resolve the error, a valid VolumeAttributesClass needs to be specified
     *  - `"Pending"` Pending indicates that the PersistentVolumeClaim cannot be modified due to unmet requirements, such as the specified VolumeAttributesClass not existing
     * @param string|null $targetVolumeAttributesClassName targetVolumeAttributesClassName is the name of the VolumeAttributesClass the PVC currently being reconciled
     */
    public function __construct(
        public string $status,
        public ?string $targetVolumeAttributesClassName = null,
    ) {
    }
}
