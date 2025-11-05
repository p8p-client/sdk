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

namespace P8p\Sdk\Schema\Autoscaling\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v1.Scale')]
#[K8sSchema(kind: 'Scale', group: 'autoscaling', version: 'v1')]
class Scale
{
    /**
     * @param ObjectMeta|null  $metadata Standard object metadata; More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     * @param ScaleSpec|null   $spec     spec defines the behavior of the scale. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status.
     * @param ScaleStatus|null $status   status is the current status of the scale. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status. Read-only.
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?ScaleSpec $spec = null,
        public ?ScaleStatus $status = null,
    ) {
    }
}
