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

namespace P8p\Sdk\Schema\Admissionregistration\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ServiceReference')]
class ServiceReference
{
    /**
     * @param string      $name      `name` is the name of the service. Required
     * @param string      $namespace `namespace` is the namespace of the service. Required
     * @param string|null $path      `path` is an optional URL path which will be sent in any request to this service
     * @param int|null    $port      If specified, the port on the service that hosting webhook. Default to 443 for backward compatibility. `port` should be a valid port number (1-65535, inclusive).
     */
    public function __construct(
        public string $name,
        public string $namespace,
        public ?string $path = null,
        public ?int $port = null,
    ) {
    }
}
