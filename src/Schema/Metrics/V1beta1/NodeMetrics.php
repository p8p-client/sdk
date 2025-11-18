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
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.metrics.pkg.apis.metrics.v1beta1.NodeMetrics')]
#[K8sSchema(kind: 'NodeMetrics', group: 'metrics.k8s.io', version: 'v1beta1')]
class NodeMetrics
{
    /**
     * @param \DateTime       $timestamp the following fields define time interval from which metrics were collected from the interval [Timestamp-Window, Timestamp]
     * @param array<mixed>    $usage     the memory usage is the memory working set
     * @param ObjectMeta|null $metadata  Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public \DateTime $timestamp,
        public array $usage,
        public string $window,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
