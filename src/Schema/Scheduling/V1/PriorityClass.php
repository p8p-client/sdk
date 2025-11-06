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

namespace P8p\Sdk\Schema\Scheduling\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.scheduling.v1.PriorityClass')]
#[K8sSchema(kind: 'PriorityClass', group: 'scheduling.k8s.io', version: 'v1')]
class PriorityClass
{
    /**
     * @param int             $value            value represents the integer value of this priority class. This is the actual priority that pods receive when they have the name of this class in their pod spec.
     * @param string|null     $description      description is an arbitrary string that usually provides guidelines on when this priority class should be used
     * @param bool|null       $globalDefault    globalDefault specifies whether this PriorityClass should be considered as the default priority for pods that do not have any priority class. Only one PriorityClass can be marked as `globalDefault`. However, if more than one PriorityClasses exists with their `globalDefault` field set to true, the smallest value of such global default PriorityClasses will be used as the default priority.
     * @param ObjectMeta|null $metadata         Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param string|null     $preemptionPolicy preemptionPolicy is the Policy for preempting pods with lower priority. One of Never, PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     *
     * Possible enum values:
     *  - `"Never"` means that pod never preempts other pods with lower priority.
     *  - `"PreemptLowerPriority"` means that pod can preempt other pods with lower priority.
     */
    public function __construct(
        public int $value,
        public ?string $description = null,
        public ?bool $globalDefault = null,
        public ?ObjectMeta $metadata = null,
        public ?string $preemptionPolicy = null,
    ) {
    }
}
