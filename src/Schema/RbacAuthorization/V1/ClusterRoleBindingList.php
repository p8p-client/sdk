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

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.ClusterRoleBindingList')]
#[K8sSchema(kind: 'ClusterRoleBindingList', group: 'rbac.authorization.k8s.io', version: 'v1')]
class ClusterRoleBindingList
{
    /**
     * @param array<int, ClusterRoleBinding> $items    Items is a list of ClusterRoleBindings
     * @param ListMeta|null                  $metadata standard object's metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
