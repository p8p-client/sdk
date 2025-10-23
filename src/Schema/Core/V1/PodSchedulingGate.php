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

class PodSchedulingGate
{
    /**
     * @param string $name Name of the scheduling gate. Each scheduling gate must have a unique name field.
     */
    public function __construct(
        public string $name,
    ) {
    }
}
