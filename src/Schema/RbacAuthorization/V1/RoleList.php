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

namespace P8p\Sdk\Schema\RbacAuthorization\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.RoleList')]
#[K8sSchema(kind: 'RoleList', group: 'rbac.authorization.k8s.io', version: 'v1')]
class RoleList
{
    /**
     * @param array<int, Role> $items    Items is a list of Roles
     * @param ListMeta|null    $metadata standard object's metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
