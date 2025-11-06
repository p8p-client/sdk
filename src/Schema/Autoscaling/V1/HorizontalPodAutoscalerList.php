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
use P8p\Sdk\Schema\Core\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v1.HorizontalPodAutoscalerList')]
#[K8sSchema(kind: 'HorizontalPodAutoscalerList', group: 'autoscaling', version: 'v1')]
class HorizontalPodAutoscalerList
{
    /**
     * @param array<int, HorizontalPodAutoscaler> $items    items is the list of horizontal pod autoscaler objects
     * @param ListMeta|null                       $metadata standard list metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
