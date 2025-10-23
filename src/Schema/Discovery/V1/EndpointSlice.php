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

namespace P8p\Sdk\Schema\Discovery\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'EndpointSlice', apiVersion: 'v1')]
class EndpointSlice
{
    /**
     * @param string $addressType addressType specifies the type of address carried by this EndpointSlice. All addresses in this slice must be the same type. This field is immutable after creation. The following address types are currently supported: * IPv4: Represents an IPv4 Address. * IPv6: Represents an IPv6 Address. * FQDN: Represents a Fully Qualified Domain Name.
     *
     * Possible enum values:
     *  - `"FQDN"` represents a FQDN.
     *  - `"IPv4"` represents an IPv4 Address.
     *  - `"IPv6"` represents an IPv6 Address.
     * @param array<int, Endpoint>          $endpoints endpoints is a list of unique endpoints in this slice. Each slice may include a maximum of 1000 endpoints.
     * @param ObjectMeta|null               $metadata  standard object's metadata
     * @param array<int, EndpointPort>|null $ports     ports specifies the list of network ports exposed by each endpoint in this slice. Each port must have a unique name. When ports is empty, it indicates that there are no defined ports. When a port is defined with a nil port value, it indicates "all ports". Each slice may include a maximum of 100 ports.
     */
    public function __construct(
        public string $addressType,
        public array $endpoints,
        public ?ObjectMeta $metadata = null,
        public ?array $ports = null,
    ) {
    }
}
