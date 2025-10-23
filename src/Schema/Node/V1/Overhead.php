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

namespace P8p\Sdk\Schema\Node\V1;

class Overhead
{
    /**
     * @param array<mixed>|null $podFixed podFixed represents the fixed resource overhead associated with running a pod
     */
    public function __construct(
        public ?array $podFixed = null,
    ) {
    }
}
