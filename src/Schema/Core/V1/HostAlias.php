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

class HostAlias
{
    /**
     * @param string                  $ip        IP address of the host file entry
     * @param array<int, string>|null $hostnames hostnames for the above IP address
     */
    public function __construct(
        public string $ip,
        public ?array $hostnames = null,
    ) {
    }
}
