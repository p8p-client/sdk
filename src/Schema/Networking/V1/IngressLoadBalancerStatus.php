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

namespace P8p\Sdk\Schema\Networking\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IngressLoadBalancerStatus')]
class IngressLoadBalancerStatus
{
    /**
     * @param array<int, IngressLoadBalancerIngress>|null $ingress ingress is a list containing ingress points for the load-balancer
     */
    public function __construct(
        public ?array $ingress = null,
    ) {
    }
}
