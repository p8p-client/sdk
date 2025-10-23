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

class ContainerPort
{
    /**
     * @param int         $containerPort Number of port to expose on the pod's IP address. This must be a valid port number, 0 < x < 65536.
     * @param string|null $hostIP        what host IP to bind the external port to
     * @param int|null    $hostPort      Number of port to expose on the host. If specified, this must be a valid port number, 0 < x < 65536. If HostNetwork is specified, this must match ContainerPort. Most containers do not need this.
     * @param string|null $name          If specified, this must be an IANA_SVC_NAME and unique within the pod. Each named port in a pod must have a unique name. Name for the port that can be referred to by services.
     * @param string|null $protocol      Protocol for port. Must be UDP, TCP, or SCTP. Defaults to "TCP".
     *
     * Possible enum values:
     *  - `"SCTP"` is the SCTP protocol.
     *  - `"TCP"` is the TCP protocol.
     *  - `"UDP"` is the UDP protocol.
     */
    public function __construct(
        public int $containerPort,
        public ?string $hostIP = null,
        public ?int $hostPort = null,
        public ?string $name = null,
        public ?string $protocol = null,
    ) {
    }
}
