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

class VolumeAttachmentSpec
{
    /**
     * @param string                 $attacher attacher indicates the name of the volume driver that MUST handle this request. This is the name returned by GetPluginName().
     * @param string                 $nodeName nodeName represents the node that the volume should be attached to
     * @param VolumeAttachmentSource $source   source represents the volume that should be attached
     */
    public function __construct(
        public string $attacher,
        public string $nodeName,
        public VolumeAttachmentSource $source,
    ) {
    }
}
