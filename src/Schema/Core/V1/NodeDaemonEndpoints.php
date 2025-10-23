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

class NodeDaemonEndpoints
{
    /**
     * @param DaemonEndpoint|null $kubeletEndpoint endpoint on which Kubelet is listening
     */
    public function __construct(
        public ?DaemonEndpoint $kubeletEndpoint = null,
    ) {
    }
}
