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

namespace P8p\Sdk\Schema\Apiextensions\V1;

class ServiceReference
{
    /**
     * @param string      $name      name is the name of the service. Required
     * @param string      $namespace namespace is the namespace of the service. Required
     * @param string|null $path      path is an optional URL path at which the webhook will be contacted
     * @param int|null    $port      port is an optional service port at which the webhook will be contacted. `port` should be a valid port number (1-65535, inclusive). Defaults to 443 for backward compatibility.
     */
    public function __construct(
        public string $name,
        public string $namespace,
        public ?string $path = null,
        public ?int $port = null,
    ) {
    }
}
