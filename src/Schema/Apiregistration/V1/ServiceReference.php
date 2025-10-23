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

namespace P8p\Sdk\Schema\Apiregistration\V1;

class ServiceReference
{
    /**
     * @param string|null $name      Name is the name of the service
     * @param string|null $namespace Namespace is the namespace of the service
     * @param int|null    $port      If specified, the port on the service that hosting webhook. Default to 443 for backward compatibility. `port` should be a valid port number (1-65535, inclusive).
     */
    public function __construct(
        public ?string $name = null,
        public ?string $namespace = null,
        public ?int $port = null,
    ) {
    }
}
