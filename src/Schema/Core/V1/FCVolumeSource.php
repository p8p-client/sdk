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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.FCVolumeSource')]
class FCVolumeSource
{
    /**
     * @param string|null             $fsType     fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     * @param int|null                $lun        lun is Optional: FC target lun number
     * @param bool|null               $readOnly   readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     * @param array<int, string>|null $targetWWNs targetWWNs is Optional: FC target worldwide names (WWNs)
     * @param array<int, string>|null $wwids      wwids Optional: FC volume world wide identifiers (wwids) Either wwids or combination of targetWWNs and lun must be set, but not both simultaneously
     */
    public function __construct(
        public ?string $fsType = null,
        public ?int $lun = null,
        public ?bool $readOnly = null,
        public ?array $targetWWNs = null,
        public ?array $wwids = null,
    ) {
    }
}
