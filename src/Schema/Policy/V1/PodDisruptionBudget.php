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
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'PodDisruptionBudget', group: 'policy', version: 'v1')]
class PodDisruptionBudget
{
    /**
     * @param ObjectMeta|null                $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param PodDisruptionBudgetSpec|null   $spec     specification of the desired behavior of the PodDisruptionBudget
     * @param PodDisruptionBudgetStatus|null $status   most recently observed status of the PodDisruptionBudget
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?PodDisruptionBudgetSpec $spec = null,
        public ?PodDisruptionBudgetStatus $status = null,
    ) {
    }
}
