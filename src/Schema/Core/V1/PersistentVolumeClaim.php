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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PersistentVolumeClaim')]
#[K8sSchema(kind: 'PersistentVolumeClaim', group: '', version: 'v1')]
class PersistentVolumeClaim
{
    /**
     * @param ObjectMeta|null                  $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param PersistentVolumeClaimSpec|null   $spec     spec defines the desired characteristics of a volume requested by a pod author. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     * @param PersistentVolumeClaimStatus|null $status   status represents the current information/status of a persistent volume claim. Read-only. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?PersistentVolumeClaimSpec $spec = null,
        public ?PersistentVolumeClaimStatus $status = null,
    ) {
    }
}
