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

class ContainerStateWaiting
{
    /**
     * @param string|null $message message regarding why the container is not yet running
     * @param string|null $reason  (brief) reason the container is not yet running
     */
    public function __construct(
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
