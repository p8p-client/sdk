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

#[K8sSchemaRef(name: 'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.v1.CustomResourceColumnDefinition')]
class CustomResourceColumnDefinition
{
    /**
     * @param string      $jsonPath    jsonPath is a simple JSON path (i.e. with array notation) which is evaluated against each custom resource to produce the value for this column.
     * @param string      $name        name is a human readable name for the column
     * @param string      $type        type is an OpenAPI type definition for this column. See https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     * @param string|null $description description is a human readable description of this column
     * @param string|null $format      format is an optional OpenAPI type definition for this column. The 'name' format is applied to the primary identifier column to assist in clients identifying column is the resource name. See https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types for details.
     * @param int|null    $priority    priority is an integer defining the relative importance of this column compared to others. Lower numbers are considered higher priority. Columns that may be omitted in limited space scenarios should be given a priority greater than 0.
     */
    public function __construct(
        public string $jsonPath,
        public string $name,
        public string $type,
        public ?string $description = null,
        public ?string $format = null,
        public ?int $priority = null,
    ) {
    }
}
