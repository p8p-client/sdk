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
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.VolumeAttachment')]
#[K8sSchema(kind: 'VolumeAttachment', group: 'storage.k8s.io', version: 'v1')]
class VolumeAttachment
{
    /**
     * @param VolumeAttachmentSpec        $spec     spec represents specification of the desired attach/detach volume behavior. Populated by the Kubernetes system.
     * @param ObjectMeta|null             $metadata Standard object metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param VolumeAttachmentStatus|null $status   status represents status of the VolumeAttachment request. Populated by the entity completing the attach or detach operation, i.e. the external-attacher.
     */
    public function __construct(
        public VolumeAttachmentSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?VolumeAttachmentStatus $status = null,
    ) {
    }
}
