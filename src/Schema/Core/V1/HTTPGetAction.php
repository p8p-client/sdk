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

class HTTPGetAction
{
    /**
     * @param int|string                  $port        Name or number of the port to access on the container. Number must be in the range 1 to 65535. Name must be an IANA_SVC_NAME.
     * @param string|null                 $host        Host name to connect to, defaults to the pod IP. You probably want to set "Host" in httpHeaders instead.
     * @param array<int, HTTPHeader>|null $httpHeaders Custom headers to set in the request. HTTP allows repeated headers.
     * @param string|null                 $path        path to access on the HTTP server
     * @param string|null                 $scheme      Scheme to use for connecting to the host. Defaults to HTTP.
     *
     * Possible enum values:
     *  - `"HTTP"` means that the scheme used will be http://
     *  - `"HTTPS"` means that the scheme used will be https://
     */
    public function __construct(
        public int|string $port,
        public ?string $host = null,
        public ?array $httpHeaders = null,
        public ?string $path = null,
        public ?string $scheme = null,
    ) {
    }
}
