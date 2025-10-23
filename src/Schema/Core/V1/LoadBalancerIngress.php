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

class LoadBalancerIngress
{
    /**
     * @param string|null                 $hostname Hostname is set for load-balancer ingress points that are DNS based (typically AWS load-balancers)
     * @param string|null                 $ip       IP is set for load-balancer ingress points that are IP based (typically GCE or OpenStack load-balancers)
     * @param string|null                 $ipMode   IPMode specifies how the load-balancer IP behaves, and may only be specified when the ip field is specified. Setting this to "VIP" indicates that traffic is delivered to the node with the destination set to the load-balancer's IP and port. Setting this to "Proxy" indicates that traffic is delivered to the node or pod with the destination set to the node's IP and node port or the pod's IP and port. Service implementations may use this information to adjust traffic routing.
     * @param array<int, PortStatus>|null $ports    Ports is a list of records of service ports If used, every port defined in the service should have an entry in it
     */
    public function __construct(
        public ?string $hostname = null,
        public ?string $ip = null,
        public ?string $ipMode = null,
        public ?array $ports = null,
    ) {
    }
}
