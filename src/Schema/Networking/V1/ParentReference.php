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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.ParentReference')]
class ParentReference
{
    /**
     * @param string      $name      name is the name of the object being referenced
     * @param string      $resource  resource is the resource of the object being referenced
     * @param string|null $group     group is the group of the object being referenced
     * @param string|null $namespace namespace is the namespace of the object being referenced
     */
    public function __construct(
        public string $name,
        public string $resource,
        public ?string $group = null,
        public ?string $namespace = null,
    ) {
    }
}
