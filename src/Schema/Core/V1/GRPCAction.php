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

class GRPCAction
{
    /**
     * @param int         $port    Port number of the gRPC service. Number must be in the range 1 to 65535.
     * @param string|null $service Service is the name of the service to place in the gRPC HealthCheckRequest (see https://github.com/grpc/grpc/blob/master/doc/health-checking.md).
     *
     * If this is not specified, the default behavior is defined by gRPC.
     */
    public function __construct(
        public int $port,
        public ?string $service = null,
    ) {
    }
}
