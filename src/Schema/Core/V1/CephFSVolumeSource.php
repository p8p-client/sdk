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

class CephFSVolumeSource
{
    /**
     * @param array<int, string>        $monitors   monitors is Required: Monitors is a collection of Ceph monitors More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     * @param string|null               $path       path is Optional: Used as the mounted root, rather than the full Ceph tree, default is /
     * @param bool|null                 $readOnly   readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     * @param string|null               $secretFile secretFile is Optional: SecretFile is the path to key ring for User, default is /etc/ceph/user.secret More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     * @param LocalObjectReference|null $secretRef  secretRef is Optional: SecretRef is reference to the authentication secret for User, default is empty. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     * @param string|null               $user       user is optional: User is the rados user name, default is admin More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function __construct(
        public array $monitors,
        public ?string $path = null,
        public ?bool $readOnly = null,
        public ?string $secretFile = null,
        public ?LocalObjectReference $secretRef = null,
        public ?string $user = null,
    ) {
    }
}
