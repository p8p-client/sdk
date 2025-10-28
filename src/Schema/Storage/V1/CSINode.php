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

namespace P8p\Sdk\Schema\Storage\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'CSINode', group: 'storage.k8s.io', version: 'v1')]
class CSINode
{
    /**
     * @param CSINodeSpec     $spec     spec is the specification of CSINode
     * @param ObjectMeta|null $metadata Standard object's metadata. metadata.name must be the Kubernetes node name.
     */
    public function __construct(
        public CSINodeSpec $spec,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
