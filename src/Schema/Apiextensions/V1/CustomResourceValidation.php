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

#[K8sSchemaRef(name: 'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.v1.CustomResourceValidation')]
class CustomResourceValidation
{
    /**
     * @param array<mixed>|null $openAPIV3Schema openAPIV3Schema is the OpenAPI v3 schema to use for validation and pruning
     */
    public function __construct(
        public ?array $openAPIV3Schema = null,
    ) {
    }
}
