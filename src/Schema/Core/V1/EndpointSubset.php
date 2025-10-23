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

class EndpointSubset
{
    /**
     * @param array<int, EndpointAddress>|null $addresses         IP addresses which offer the related ports that are marked as ready. These endpoints should be considered safe for load balancers and clients to utilize.
     * @param array<int, EndpointAddress>|null $notReadyAddresses IP addresses which offer the related ports but are not currently marked as ready because they have not yet finished starting, have recently failed a readiness check, or have recently failed a liveness check
     * @param array<int, EndpointPort>|null    $ports             port numbers available on the related IP addresses
     */
    public function __construct(
        public ?array $addresses = null,
        public ?array $notReadyAddresses = null,
        public ?array $ports = null,
    ) {
    }
}
