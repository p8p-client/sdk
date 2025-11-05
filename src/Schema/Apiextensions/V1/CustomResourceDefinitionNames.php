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

namespace P8p\Sdk\Schema\Apiextensions\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.v1.CustomResourceDefinitionNames')]
class CustomResourceDefinitionNames
{
    /**
     * @param string                  $kind       kind is the serialized kind of the resource. It is normally CamelCase and singular. Custom resource instances will use this value as the `kind` attribute in API calls.
     * @param string                  $plural     plural is the plural name of the resource to serve. The custom resources are served under `/apis/<group>/<version>/.../<plural>`. Must match the name of the CustomResourceDefinition (in the form `<names.plural>.<group>`). Must be all lowercase.
     * @param array<int, string>|null $categories categories is a list of grouped resources this custom resource belongs to (e.g. 'all'). This is published in API discovery documents, and used by clients to support invocations like `kubectl get all`.
     * @param string|null             $listKind   listKind is the serialized kind of the list for this resource. Defaults to "`kind`List".
     * @param array<int, string>|null $shortNames shortNames are short names for the resource, exposed in API discovery documents, and used by clients to support invocations like `kubectl get <shortname>`. It must be all lowercase.
     * @param string|null             $singular   singular is the singular name of the resource. It must be all lowercase. Defaults to lowercased `kind`.
     */
    public function __construct(
        public string $kind,
        public string $plural,
        public ?array $categories = null,
        public ?string $listKind = null,
        public ?array $shortNames = null,
        public ?string $singular = null,
    ) {
    }
}
