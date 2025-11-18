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

namespace P8p\Sdk\Schema\Metrics\V1beta1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.metrics.pkg.apis.metrics.v1beta1.PodMetricsList')]
#[K8sSchema(kind: 'PodMetricsList', group: 'metrics.k8s.io', version: 'v1beta1')]
class PodMetricsList
{
    /**
     * @param array<int, PodMetrics> $items    list of pod metrics
     * @param ListMeta|null          $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
