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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.ServiceBackendPort')]
class ServiceBackendPort
{
    /**
     * @param string|null $name   name is the name of the port on the Service. This is a mutually exclusive setting with "Number".
     * @param int|null    $number number is the numerical port number (e.g. 80) on the Service. This is a mutually exclusive setting with "Name".
     */
    public function __construct(
        public ?string $name = null,
        public ?int $number = null,
    ) {
    }
}
