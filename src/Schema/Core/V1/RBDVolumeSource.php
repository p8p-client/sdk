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

class RBDVolumeSource
{
    /**
     * @param string                    $image     image is the rados image name. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param array<int, string>        $monitors  monitors is a collection of Ceph monitors. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param string|null               $fsType    fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#rbd
     * @param string|null               $keyring   keyring is the path to key ring for RBDUser. Default is /etc/ceph/keyring. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param string|null               $pool      pool is the rados pool name. Default is rbd. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param bool|null                 $readOnly  readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param LocalObjectReference|null $secretRef secretRef is name of the authentication secret for RBDUser. If provided overrides keyring. Default is nil. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     * @param string|null               $user      user is the rados user name. Default is admin. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function __construct(
        public string $image,
        public array $monitors,
        public ?string $fsType = null,
        public ?string $keyring = null,
        public ?string $pool = null,
        public ?bool $readOnly = null,
        public ?LocalObjectReference $secretRef = null,
        public ?string $user = null,
    ) {
    }
}
