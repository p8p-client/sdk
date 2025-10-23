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

class IngressServiceBackend
{
    /**
     * @param string                  $name name is the referenced service. The service must exist in the same namespace as the Ingress object.
     * @param ServiceBackendPort|null $port port of the referenced service. A port name or port number is required for a IngressServiceBackend.
     */
    public function __construct(
        public string $name,
        public ?ServiceBackendPort $port = null,
    ) {
    }
}
