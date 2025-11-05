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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NFSVolumeSource')]
class NFSVolumeSource
{
    /**
     * @param string    $path     path that is exported by the NFS server. More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     * @param string    $server   server is the hostname or IP address of the NFS server. More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     * @param bool|null $readOnly readOnly here will force the NFS export to be mounted with read-only permissions. Defaults to false. More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function __construct(
        public string $path,
        public string $server,
        public ?bool $readOnly = null,
    ) {
    }
}
