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

namespace P8p\Sdk\Schema\Events\V1;

class EventSeries
{
    /**
     * @param int       $count            count is the number of occurrences in this series up to the last heartbeat time
     * @param \DateTime $lastObservedTime lastObservedTime is the time when last Event from the series was seen before last heartbeat
     */
    public function __construct(
        public int $count,
        public \DateTime $lastObservedTime,
    ) {
    }
}
