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

class TypedLocalObjectReference
{
    /**
     * @param string      $kind     Kind is the type of resource being referenced
     * @param string      $name     Name is the name of resource being referenced
     * @param string|null $apiGroup APIGroup is the group for the resource being referenced. If APIGroup is not specified, the specified Kind must be in the core API group. For any other third-party types, APIGroup is required.
     */
    public function __construct(
        public string $kind,
        public string $name,
        public ?string $apiGroup = null,
    ) {
    }
}
