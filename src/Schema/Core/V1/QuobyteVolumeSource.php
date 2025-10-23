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

class QuobyteVolumeSource
{
    /**
     * @param string      $registry registry represents a single or multiple Quobyte Registry services specified as a string as host:port pair (multiple entries are separated with commas) which acts as the central registry for volumes
     * @param string      $volume   volume is a string that references an already created Quobyte volume by name
     * @param string|null $group    group to map volume access to Default is no group
     * @param bool|null   $readOnly readOnly here will force the Quobyte volume to be mounted with read-only permissions. Defaults to false.
     * @param string|null $tenant   tenant owning the given Quobyte volume in the Backend Used with dynamically provisioned Quobyte volumes, value is set by the plugin
     * @param string|null $user     user to map volume access to Defaults to serivceaccount user
     */
    public function __construct(
        public string $registry,
        public string $volume,
        public ?string $group = null,
        public ?bool $readOnly = null,
        public ?string $tenant = null,
        public ?string $user = null,
    ) {
    }
}
