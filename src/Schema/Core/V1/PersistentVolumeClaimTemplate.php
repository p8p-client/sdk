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
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PersistentVolumeClaimTemplate')]
class PersistentVolumeClaimTemplate
{
    /**
     * @param PersistentVolumeClaimSpec $spec     The specification for the PersistentVolumeClaim. The entire content is copied unchanged into the PVC that gets created from this template. The same fields as in a PersistentVolumeClaim are also valid here.
     * @param ObjectMeta|null           $metadata May contain labels and annotations that will be copied into the PVC when creating it. No other fields are allowed and will be rejected during validation.
     */
    public function __construct(
        public PersistentVolumeClaimSpec $spec,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
