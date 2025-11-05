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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ISCSIVolumeSource')]
class ISCSIVolumeSource
{
    /**
     * @param string                    $iqn               iqn is the target iSCSI Qualified Name
     * @param int                       $lun               lun represents iSCSI Target Lun number
     * @param string                    $targetPortal      targetPortal is iSCSI Target Portal. The Portal is either an IP or ip_addr:port if the port is other than default (typically TCP ports 860 and 3260).
     * @param bool|null                 $chapAuthDiscovery chapAuthDiscovery defines whether support iSCSI Discovery CHAP authentication
     * @param bool|null                 $chapAuthSession   chapAuthSession defines whether support iSCSI Session CHAP authentication
     * @param string|null               $fsType            fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#iscsi
     * @param string|null               $initiatorName     initiatorName is the custom iSCSI Initiator Name. If initiatorName is specified with iscsiInterface simultaneously, new iSCSI interface <target portal>:<volume name> will be created for the connection.
     * @param string|null               $iscsiInterface    iscsiInterface is the interface Name that uses an iSCSI transport. Defaults to 'default' (tcp).
     * @param array<int, string>|null   $portals           portals is the iSCSI Target Portal List. The portal is either an IP or ip_addr:port if the port is other than default (typically TCP ports 860 and 3260).
     * @param bool|null                 $readOnly          readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false.
     * @param LocalObjectReference|null $secretRef         secretRef is the CHAP Secret for iSCSI target and initiator authentication
     */
    public function __construct(
        public string $iqn,
        public int $lun,
        public string $targetPortal,
        public ?bool $chapAuthDiscovery = null,
        public ?bool $chapAuthSession = null,
        public ?string $fsType = null,
        public ?string $initiatorName = null,
        public ?string $iscsiInterface = null,
        public ?array $portals = null,
        public ?bool $readOnly = null,
        public ?LocalObjectReference $secretRef = null,
    ) {
    }
}
