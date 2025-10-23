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

namespace P8p\Sdk\Schema\Authorization\V1;

class NonResourceAttributes
{
    /**
     * @param string|null $path Path is the URL path of the request
     * @param string|null $verb Verb is the standard HTTP verb
     */
    public function __construct(
        public ?string $path = null,
        public ?string $verb = null,
    ) {
    }
}
