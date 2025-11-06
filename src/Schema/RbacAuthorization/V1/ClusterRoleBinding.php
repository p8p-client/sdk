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
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.ClusterRoleBinding')]
#[K8sSchema(kind: 'ClusterRoleBinding', group: 'rbac.authorization.k8s.io', version: 'v1')]
class ClusterRoleBinding
{
    /**
     * @param RoleRef                  $roleRef  RoleRef can only reference a ClusterRole in the global namespace. If the RoleRef cannot be resolved, the Authorizer must return an error. This field is immutable.
     * @param ObjectMeta|null          $metadata standard object's metadata
     * @param array<int, Subject>|null $subjects subjects holds references to the objects the role applies to
     */
    public function __construct(
        public RoleRef $roleRef,
        public ?ObjectMeta $metadata = null,
        public ?array $subjects = null,
    ) {
    }
}
