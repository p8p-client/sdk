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

class VsphereVirtualDiskVolumeSource
{
    /**
     * @param string      $volumePath        volumePath is the path that identifies vSphere volume vmdk
     * @param string|null $fsType            fsType is filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     * @param string|null $storagePolicyID   storagePolicyID is the storage Policy Based Management (SPBM) profile ID associated with the StoragePolicyName
     * @param string|null $storagePolicyName storagePolicyName is the storage Policy Based Management (SPBM) profile name
     */
    public function __construct(
        public string $volumePath,
        public ?string $fsType = null,
        public ?string $storagePolicyID = null,
        public ?string $storagePolicyName = null,
    ) {
    }
}
