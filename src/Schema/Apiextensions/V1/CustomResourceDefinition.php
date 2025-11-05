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

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.v1.CustomResourceDefinition')]
#[K8sSchema(kind: 'CustomResourceDefinition', group: 'apiextensions.k8s.io', version: 'v1')]
class CustomResourceDefinition
{
    /**
     * @param CustomResourceDefinitionSpec        $spec     spec describes how the user wants the resources to appear
     * @param ObjectMeta|null                     $metadata Standard object's metadata More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param CustomResourceDefinitionStatus|null $status   status indicates the actual state of the CustomResourceDefinition
     */
    public function __construct(
        public CustomResourceDefinitionSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?CustomResourceDefinitionStatus $status = null,
    ) {
    }
}
