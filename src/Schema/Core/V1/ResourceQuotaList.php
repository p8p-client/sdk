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
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ResourceQuotaList')]
#[K8sSchema(kind: 'ResourceQuotaList', group: '', version: 'v1')]
class ResourceQuotaList
{
    /**
     * @param array<int, ResourceQuota> $items    Items is a list of ResourceQuota objects. More info: https://kubernetes.io/docs/concepts/policy/resource-quotas/
     * @param ListMeta|null             $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
