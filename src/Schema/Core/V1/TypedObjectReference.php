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

namespace P8p\Sdk\Schema\Core\V1;

class TypedObjectReference
{
    /**
     * @param string      $kind      Kind is the type of resource being referenced
     * @param string      $name      Name is the name of resource being referenced
     * @param string|null $apiGroup  APIGroup is the group for the resource being referenced. If APIGroup is not specified, the specified Kind must be in the core API group. For any other third-party types, APIGroup is required.
     * @param string|null $namespace Namespace is the namespace of resource being referenced Note that when a namespace is specified, a gateway.networking.k8s.io/ReferenceGrant object is required in the referent namespace to allow that namespace's owner to accept the reference. See the ReferenceGrant documentation for details. (Alpha) This field requires the CrossNamespaceVolumeDataSource feature gate to be enabled.
     */
    public function __construct(
        public string $kind,
        public string $name,
        public ?string $apiGroup = null,
        public ?string $namespace = null,
    ) {
    }
}
