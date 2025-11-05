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

namespace P8p\Sdk\Schema\Rbac\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.RoleRef')]
class RoleRef
{
    /**
     * @param string $apiGroup APIGroup is the group for the resource being referenced
     * @param string $kind     Kind is the type of resource being referenced
     * @param string $name     Name is the name of resource being referenced
     */
    public function __construct(
        public string $apiGroup,
        public string $kind,
        public string $name,
    ) {
    }
}
