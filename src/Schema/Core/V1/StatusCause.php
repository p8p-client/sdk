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

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.StatusCause')]
class StatusCause
{
    /**
     * @param string|null $field The field of the resource that has caused this error, as named by its JSON serialization. May include dot and postfix notation for nested attributes. Arrays are zero-indexed.  Fields may appear more than once in an array of causes due to fields having multiple errors. Optional.
     *
     * Examples:
     *   "name" - the field "name" on the current resource
     *   "items[0].name" - the field "name" on the first array entry in "items"
     * @param string|null $message A human-readable description of the cause of the error.  This field may be presented as-is to a reader.
     * @param string|null $reason  A machine-readable description of the cause of the error. If this value is empty there is no information available.
     */
    public function __construct(
        public ?string $field = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
