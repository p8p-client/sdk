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

namespace P8p\Sdk\Schema\Flowcontrol\V1;

class LimitResponse
{
    /**
     * @param string                    $type    `type` is "Queue" or "Reject". "Queue" means that requests that can not be executed upon arrival are held in a queue until they can be executed or a queuing limit is reached. "Reject" means that requests that can not be executed upon arrival are rejected. Required.
     * @param QueuingConfiguration|null $queuing `queuing` holds the configuration parameters for queuing. This field may be non-empty only if `type` is `"Queue"`.
     */
    public function __construct(
        public string $type,
        public ?QueuingConfiguration $queuing = null,
    ) {
    }
}
