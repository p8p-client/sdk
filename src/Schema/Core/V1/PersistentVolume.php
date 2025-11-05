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

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PersistentVolume')]
#[K8sSchema(kind: 'PersistentVolume', group: '', version: 'v1')]
class PersistentVolume
{
    /**
     * @param ObjectMeta|null             $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param PersistentVolumeSpec|null   $spec     spec defines a specification of a persistent volume owned by the cluster. Provisioned by an administrator. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistent-volumes
     * @param PersistentVolumeStatus|null $status   status represents the current information/status for the persistent volume. Populated by the system. Read-only. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistent-volumes
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?PersistentVolumeSpec $spec = null,
        public ?PersistentVolumeStatus $status = null,
    ) {
    }
}
