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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IngressLoadBalancerIngress')]
class IngressLoadBalancerIngress
{
    /**
     * @param string|null                        $hostname hostname is set for load-balancer ingress points that are DNS based
     * @param string|null                        $ip       ip is set for load-balancer ingress points that are IP based
     * @param array<int, IngressPortStatus>|null $ports    ports provides information about the ports exposed by this LoadBalancer
     */
    public function __construct(
        public ?string $hostname = null,
        public ?string $ip = null,
        public ?array $ports = null,
    ) {
    }
}
