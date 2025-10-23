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

class Capabilities
{
    /**
     * @param array<int, string>|null $add  Added capabilities
     * @param array<int, string>|null $drop Removed capabilities
     */
    public function __construct(
        public ?array $add = null,
        public ?array $drop = null,
    ) {
    }
}
