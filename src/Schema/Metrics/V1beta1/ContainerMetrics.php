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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.metrics.pkg.apis.metrics.v1beta1.ContainerMetrics')]
class ContainerMetrics
{
    /**
     * @param string       $name  Container name corresponding to the one from pod.spec.containers.
     * @param array<mixed> $usage the memory usage is the memory working set
     */
    public function __construct(
        public string $name,
        public array $usage,
    ) {
    }
}
