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

namespace P8p\Sdk\Schema\Authorization\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.authorization.v1.ResourceAttributes')]
class ResourceAttributes
{
    /**
     * @param FieldSelectorAttributes|null $fieldSelector fieldSelector describes the limitation on access based on field.  It can only limit access, not broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature gate (disabled by default).
     * @param string|null                  $group         Group is the API Group of the Resource.  "*" means all.
     * @param LabelSelectorAttributes|null $labelSelector labelSelector describes the limitation on access based on labels.  It can only limit access, not broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature gate (disabled by default).
     * @param string|null $name        Name is the name of the resource being requested for a "get" or deleted for a "delete". "" (empty) means all.
     * @param string|null $namespace   Namespace is the namespace of the action being requested.  Currently, there is no distinction between no namespace and all namespaces "" (empty) is defaulted for LocalSubjectAccessReviews "" (empty) is empty for cluster-scoped resources "" (empty) means "all" for namespace scoped resources from a SubjectAccessReview or SelfSubjectAccessReview
     * @param string|null $resource    Resource is one of the existing resource types.  "*" means all.
     * @param string|null $subresource Subresource is one of the existing resource types.  "" means none.
     * @param string|null $verb        Verb is a kubernetes resource API verb, like: get, list, watch, create, update, delete, proxy.  "*" means all.
     * @param string|null $version     Version is the API Version of the Resource.  "*" means all.
     */
    public function __construct(
        public ?FieldSelectorAttributes $fieldSelector = null,
        public ?string $group = null,
        public ?LabelSelectorAttributes $labelSelector = null,
        public ?string $name = null,
        public ?string $namespace = null,
        public ?string $resource = null,
        public ?string $subresource = null,
        public ?string $verb = null,
        public ?string $version = null,
    ) {
    }
}
