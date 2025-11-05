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

use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\PersistentVolumeSpec;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.VolumeAttachmentSource')]
class VolumeAttachmentSource
{
    /**
     * @param PersistentVolumeSpec|null $inlineVolumeSpec     inlineVolumeSpec contains all the information necessary to attach a persistent volume defined by a pod's inline VolumeSource. This field is populated only for the CSIMigration feature. It contains translated fields from a pod's inline VolumeSource to a PersistentVolumeSpec. This field is beta-level and is only honored by servers that enabled the CSIMigration feature.
     * @param string|null               $persistentVolumeName persistentVolumeName represents the name of the persistent volume to attach
     */
    public function __construct(
        public ?PersistentVolumeSpec $inlineVolumeSpec = null,
        public ?string $persistentVolumeName = null,
    ) {
    }
}
