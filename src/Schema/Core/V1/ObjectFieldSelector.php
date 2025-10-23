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

class ObjectFieldSelector
{
    /**
     * @param string      $fieldPath  path of the field to select in the specified API version
     * @param string|null $apiVersion version of the schema the FieldPath is written in terms of, defaults to "v1"
     */
    public function __construct(
        public string $fieldPath,
        public ?string $apiVersion = null,
    ) {
    }
}
