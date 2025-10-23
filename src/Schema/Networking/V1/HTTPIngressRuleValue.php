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

namespace P8p\Sdk\Schema\Networking\V1;

class HTTPIngressRuleValue
{
    /**
     * @param array<int, HTTPIngressPath> $paths paths is a collection of paths that map requests to backends
     */
    public function __construct(
        public array $paths,
    ) {
    }
}
