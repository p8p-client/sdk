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

class LinuxContainerUser
{
    /**
     * @param int                  $gid                GID is the primary gid initially attached to the first process in the container
     * @param int                  $uid                UID is the primary uid initially attached to the first process in the container
     * @param array<int, int>|null $supplementalGroups SupplementalGroups are the supplemental groups initially attached to the first process in the container
     */
    public function __construct(
        public int $gid,
        public int $uid,
        public ?array $supplementalGroups = null,
    ) {
    }
}
