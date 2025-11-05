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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.TCPSocketAction')]
class TCPSocketAction
{
    /**
     * @param int|string  $port Number or name of the port to access on the container. Number must be in the range 1 to 65535. Name must be an IANA_SVC_NAME.
     * @param string|null $host optional: Host name to connect to, defaults to the pod IP
     */
    public function __construct(
        public int|string $port,
        public ?string $host = null,
    ) {
    }
}
