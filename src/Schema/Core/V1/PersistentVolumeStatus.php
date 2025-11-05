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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PersistentVolumeStatus')]
class PersistentVolumeStatus
{
    /**
     * @param \DateTime|null $lastPhaseTransitionTime lastPhaseTransitionTime is the time the phase transitioned from one to another and automatically resets to current time everytime a volume phase transitions
     * @param string|null    $message                 message is a human-readable message indicating details about why the volume is in this state
     * @param string|null    $phase                   phase indicates if a volume is available, bound to a claim, or released by a claim. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#phase
     *
     * Possible enum values:
     *  - `"Available"` used for PersistentVolumes that are not yet bound Available volumes are held by the binder and matched to PersistentVolumeClaims
     *  - `"Bound"` used for PersistentVolumes that are bound
     *  - `"Failed"` used for PersistentVolumes that failed to be correctly recycled or deleted after being released from a claim
     *  - `"Pending"` used for PersistentVolumes that are not available
     *  - `"Released"` used for PersistentVolumes where the bound PersistentVolumeClaim was deleted released volumes must be recycled before becoming available again this phase is used by the persistent volume claim binder to signal to another process to reclaim the resource
     * @param string|null $reason reason is a brief CamelCase string that describes any failure and is meant for machine parsing and tidy display in the CLI
     */
    public function __construct(
        public ?\DateTime $lastPhaseTransitionTime = null,
        public ?string $message = null,
        public ?string $phase = null,
        public ?string $reason = null,
    ) {
    }
}
