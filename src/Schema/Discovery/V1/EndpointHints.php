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

class EndpointHints
{
    /**
     * @param array<int, ForZone>|null $forZones forZones indicates the zone(s) this endpoint should be consumed by to enable topology aware routing
     */
    public function __construct(
        public ?array $forZones = null,
    ) {
    }
}
