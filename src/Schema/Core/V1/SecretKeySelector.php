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

class SecretKeySelector
{
    /**
     * @param string      $key      The key of the secret to select from.  Must be a valid secret key.
     * @param string|null $name     Name of the referent. This field is effectively required, but due to backwards compatibility is allowed to be empty. Instances of this type with an empty value here are almost certainly wrong. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     * @param bool|null   $optional Specify whether the Secret or its key must be defined
     */
    public function __construct(
        public string $key,
        public ?string $name = null,
        public ?bool $optional = null,
    ) {
    }
}
