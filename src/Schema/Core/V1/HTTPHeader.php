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

class HTTPHeader
{
    /**
     * @param string $name  The header field name. This will be canonicalized upon output, so case-variant names will be understood as the same header.
     * @param string $value The header field value
     */
    public function __construct(
        public string $name,
        public string $value,
    ) {
    }
}
