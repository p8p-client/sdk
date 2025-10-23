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

class SleepAction
{
    /**
     * @param int $seconds seconds is the number of seconds to sleep
     */
    public function __construct(
        public int $seconds,
    ) {
    }
}
