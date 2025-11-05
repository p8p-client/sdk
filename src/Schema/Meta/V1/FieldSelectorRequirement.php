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

namespace P8p\Sdk\Schema\Meta\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.FieldSelectorRequirement')]
class FieldSelectorRequirement
{
    /**
     * @param string                  $key      key is the field selector key that the requirement applies to
     * @param string                  $operator operator represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists, DoesNotExist. The list of operators may grow in the future.
     * @param array<int, string>|null $values   values is an array of string values. If the operator is In or NotIn, the values array must be non-empty. If the operator is Exists or DoesNotExist, the values array must be empty.
     */
    public function __construct(
        public string $key,
        public string $operator,
        public ?array $values = null,
    ) {
    }
}
