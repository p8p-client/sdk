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

class SecretReference
{
    /**
     * @param string|null $name      name is unique within a namespace to reference a secret resource
     * @param string|null $namespace namespace defines the space within which the secret name must be unique
     */
    public function __construct(
        public ?string $name = null,
        public ?string $namespace = null,
    ) {
    }
}
