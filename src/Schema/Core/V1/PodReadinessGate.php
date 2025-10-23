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

class PodReadinessGate
{
    /**
     * @param string $conditionType conditionType refers to a condition in the pod's condition list with matching type
     */
    public function __construct(
        public string $conditionType,
    ) {
    }
}
