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

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.VolumeAttachmentStatus')]
class VolumeAttachmentStatus
{
    /**
     * @param bool              $attached           attached indicates the volume is successfully attached. This field must only be set by the entity completing the attach operation, i.e. the external-attacher.
     * @param VolumeError|null  $attachError        attachError represents the last error encountered during attach operation, if any. This field must only be set by the entity completing the attach operation, i.e. the external-attacher.
     * @param array<mixed>|null $attachmentMetadata attachmentMetadata is populated with any information returned by the attach operation, upon successful attach, that must be passed into subsequent WaitForAttach or Mount calls. This field must only be set by the entity completing the attach operation, i.e. the external-attacher.
     * @param VolumeError|null  $detachError        detachError represents the last error encountered during detach operation, if any. This field must only be set by the entity completing the detach operation, i.e. the external-attacher.
     */
    public function __construct(
        public bool $attached,
        public ?VolumeError $attachError = null,
        public ?array $attachmentMetadata = null,
        public ?VolumeError $detachError = null,
    ) {
    }
}
