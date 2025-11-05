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

namespace P8p\Sdk\Schema\Policy\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.policy.v1.PodDisruptionBudgetList')]
#[K8sSchema(kind: 'PodDisruptionBudgetList', group: 'policy', version: 'v1')]
class PodDisruptionBudgetList
{
    /**
     * @param array<int, PodDisruptionBudget> $items    Items is a list of PodDisruptionBudgets
     * @param ListMeta|null                   $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
