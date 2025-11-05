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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IngressPortStatus')]
class IngressPortStatus
{
    /**
     * @param int    $port     port is the port number of the ingress port
     * @param string $protocol protocol is the protocol of the ingress port. The supported values are: "TCP", "UDP", "SCTP"
     *
     * Possible enum values:
     *  - `"SCTP"` is the SCTP protocol.
     *  - `"TCP"` is the TCP protocol.
     *  - `"UDP"` is the UDP protocol.
     * @param string|null $error error is to record the problem with the service port The format of the error shall comply with the following rules: - built-in error values shall be specified in this file and those shall use
     *                           CamelCase names
     *                           - cloud provider specific error values must have names that comply with the
     *                           format foo.example.com/CamelCase.
     */
    public function __construct(
        public int $port,
        public string $protocol,
        public ?string $error = null,
    ) {
    }
}
