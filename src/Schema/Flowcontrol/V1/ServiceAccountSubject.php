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

class ServiceAccountSubject
{
    /**
     * @param string $name      `name` is the name of matching ServiceAccount objects, or "*" to match regardless of name. Required.
     * @param string $namespace `namespace` is the namespace of matching ServiceAccount objects. Required.
     */
    public function __construct(
        public string $name,
        public string $namespace,
    ) {
    }
}
