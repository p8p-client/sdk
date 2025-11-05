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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ResourceQuota')]
#[K8sSchema(kind: 'ResourceQuota', group: '', version: 'v1')]
class ResourceQuota
{
    /**
     * @param ObjectMeta|null          $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param ResourceQuotaSpec|null   $spec     Spec defines the desired quota. https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     * @param ResourceQuotaStatus|null $status   Status defines the actual enforced quota and its current usage. https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?ResourceQuotaSpec $spec = null,
        public ?ResourceQuotaStatus $status = null,
    ) {
    }
}
