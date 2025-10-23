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

namespace P8p\Sdk\Schema\Meta\V1;

class Preconditions
{
    /**
     * @param string|null $resourceVersion Specifies the target ResourceVersion
     * @param string|null $uid             specifies the target UID
     */
    public function __construct(
        public ?string $resourceVersion = null,
        public ?string $uid = null,
    ) {
    }
}
