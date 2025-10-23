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

class PhotonPersistentDiskVolumeSource
{
    /**
     * @param string      $pdID   pdID is the ID that identifies Photon Controller persistent disk
     * @param string|null $fsType fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     */
    public function __construct(
        public string $pdID,
        public ?string $fsType = null,
    ) {
    }
}
