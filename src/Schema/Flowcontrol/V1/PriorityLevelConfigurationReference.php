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

class PriorityLevelConfigurationReference
{
    /**
     * @param string $name `name` is the name of the priority level configuration being referenced Required
     */
    public function __construct(
        public string $name,
    ) {
    }
}
