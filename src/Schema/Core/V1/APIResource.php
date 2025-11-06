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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.APIResource')]
class APIResource
{
    /**
     * @param string                  $kind               kind is the kind for the resource (e.g. 'Foo' is the kind for a resource 'foo')
     * @param string                  $name               name is the plural name of the resource
     * @param bool                    $namespaced         namespaced indicates if a resource is namespaced or not
     * @param string                  $singularName       singularName is the singular name of the resource.  This allows clients to handle plural and singular opaquely. The singularName is more correct for reporting status on a single item and both singular and plural are allowed from the kubectl CLI interface.
     * @param array<int, string>      $verbs              verbs is a list of supported kube verbs (this includes get, list, watch, create, update, patch, delete, deletecollection, and proxy)
     * @param array<int, string>|null $categories         categories is a list of the grouped resources this resource belongs to (e.g. 'all')
     * @param string|null             $group              group is the preferred group of the resource.  Empty implies the group of the containing resource list. For subresources, this may have a different value, for example: Scale".
     * @param array<int, string>|null $shortNames         shortNames is a list of suggested short names of the resource
     * @param string|null             $storageVersionHash The hash value of the storage version, the version this resource is converted to when written to the data store. Value must be treated as opaque by clients. Only equality comparison on the value is valid. This is an alpha feature and may change or be removed in the future. The field is populated by the apiserver only if the StorageVersionHash feature gate is enabled. This field will remain optional even if it graduates.
     * @param string|null             $version            version is the preferred version of the resource.  Empty implies the version of the containing resource list For subresources, this may have a different value, for example: v1 (while inside a v1beta1 version of the core resource's group)".
     */
    public function __construct(
        public string $kind,
        public string $name,
        public bool $namespaced,
        public string $singularName,
        public array $verbs,
        public ?array $categories = null,
        public ?string $group = null,
        public ?array $shortNames = null,
        public ?string $storageVersionHash = null,
        public ?string $version = null,
    ) {
    }
}
