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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IPBlock')]
class IPBlock
{
    /**
     * @param string                  $cidr   cidr is a string representing the IPBlock Valid examples are "192.168.1.0/24" or "2001:db8::/64"
     * @param array<int, string>|null $except except is a slice of CIDRs that should not be included within an IPBlock Valid examples are "192.168.1.0/24" or "2001:db8::/64" Except values will be rejected if they are outside the cidr range
     */
    public function __construct(
        public string $cidr,
        public ?array $except = null,
    ) {
    }
}
