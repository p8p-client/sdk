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

class ScaleIOVolumeSource
{
    /**
     * @param string               $gateway          gateway is the host address of the ScaleIO API Gateway
     * @param LocalObjectReference $secretRef        secretRef references to the secret for ScaleIO user and other sensitive information. If this is not provided, Login operation will fail.
     * @param string               $system           system is the name of the storage system as configured in ScaleIO
     * @param string|null          $fsType           fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Default is "xfs".
     * @param string|null          $protectionDomain protectionDomain is the name of the ScaleIO Protection Domain for the configured storage
     * @param bool|null            $readOnly         readOnly Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     * @param bool|null            $sslEnabled       sslEnabled Flag enable/disable SSL communication with Gateway, default false
     * @param string|null          $storageMode      storageMode indicates whether the storage for a volume should be ThickProvisioned or ThinProvisioned. Default is ThinProvisioned.
     * @param string|null          $storagePool      storagePool is the ScaleIO Storage Pool associated with the protection domain
     * @param string|null          $volumeName       volumeName is the name of a volume already created in the ScaleIO system that is associated with this volume source
     */
    public function __construct(
        public string $gateway,
        public LocalObjectReference $secretRef,
        public string $system,
        public ?string $fsType = null,
        public ?string $protectionDomain = null,
        public ?bool $readOnly = null,
        public ?bool $sslEnabled = null,
        public ?string $storageMode = null,
        public ?string $storagePool = null,
        public ?string $volumeName = null,
    ) {
    }
}
