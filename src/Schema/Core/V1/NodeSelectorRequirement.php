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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeSelectorRequirement')]
class NodeSelectorRequirement
{
    /**
     * @param string $key      the label key that the selector applies to
     * @param string $operator Represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists, DoesNotExist. Gt, and Lt.
     *
     * Possible enum values:
     *  - `"DoesNotExist"`
     *  - `"Exists"`
     *  - `"Gt"`
     *  - `"In"`
     *  - `"Lt"`
     *  - `"NotIn"`
     * @param array<int, string>|null $values An array of string values. If the operator is In or NotIn, the values array must be non-empty. If the operator is Exists or DoesNotExist, the values array must be empty. If the operator is Gt or Lt, the values array must have a single element, which will be interpreted as an integer. This array is replaced during a strategic merge patch.
     */
    public function __construct(
        public string $key,
        public string $operator,
        public ?array $values = null,
    ) {
    }
}
