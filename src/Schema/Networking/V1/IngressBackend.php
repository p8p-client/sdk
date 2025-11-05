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
use P8p\Sdk\Schema\Core\V1\TypedLocalObjectReference;

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IngressBackend')]
class IngressBackend
{
    /**
     * @param TypedLocalObjectReference|null $resource resource is an ObjectRef to another Kubernetes resource in the namespace of the Ingress object. If resource is specified, a service.Name and service.Port must not be specified. This is a mutually exclusive setting with "Service".
     * @param IngressServiceBackend|null     $service  service references a service as a backend. This is a mutually exclusive setting with "Resource".
     */
    public function __construct(
        public ?TypedLocalObjectReference $resource = null,
        public ?IngressServiceBackend $service = null,
    ) {
    }
}
