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

namespace P8p\Sdk\Schema\Discovery\V1;

class ForZone
{
    /**
     * @param string $name name represents the name of the zone
     */
    public function __construct(
        public string $name,
    ) {
    }
}
