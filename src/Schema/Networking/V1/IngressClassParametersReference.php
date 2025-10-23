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

class IngressClassParametersReference
{
    /**
     * @param string      $kind      kind is the type of resource being referenced
     * @param string      $name      name is the name of resource being referenced
     * @param string|null $apiGroup  apiGroup is the group for the resource being referenced. If APIGroup is not specified, the specified Kind must be in the core API group. For any other third-party types, APIGroup is required.
     * @param string|null $namespace namespace is the namespace of the resource being referenced. This field is required when scope is set to "Namespace" and must be unset when scope is set to "Cluster".
     * @param string|null $scope     scope represents if this refers to a cluster or namespace scoped resource. This may be set to "Cluster" (default) or "Namespace".
     */
    public function __construct(
        public string $kind,
        public string $name,
        public ?string $apiGroup = null,
        public ?string $namespace = null,
        public ?string $scope = null,
    ) {
    }
}
