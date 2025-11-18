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

#[K8sSchemaRef(name: 'io.k8s.metrics.pkg.apis.metrics.v1beta1.PodMetrics')]
#[K8sSchema(kind: 'PodMetrics', group: 'metrics.k8s.io', version: 'v1beta1')]
class PodMetrics
{
    /**
     * @param array<int, ContainerMetrics> $containers metrics for all containers are collected within the same time window
     * @param \DateTime                    $timestamp  the following fields define time interval from which metrics were collected from the interval [Timestamp-Window, Timestamp]
     * @param ObjectMeta|null              $metadata   Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public array $containers,
        public \DateTime $timestamp,
        public string $window,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
