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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.LoadBalancerStatus')]
class LoadBalancerStatus
{
    /**
     * @param array<int, LoadBalancerIngress>|null $ingress Ingress is a list containing ingress points for the load-balancer. Traffic intended for the service should be sent to these ingress points.
     */
    public function __construct(
        public ?array $ingress = null,
    ) {
    }
}
