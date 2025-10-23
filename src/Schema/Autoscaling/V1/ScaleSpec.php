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

namespace P8p\Sdk\Schema\Autoscaling\V1;

class ScaleSpec
{
    /**
     * @param int|null $replicas replicas is the desired number of instances for the scaled object
     */
    public function __construct(
        public ?int $replicas = null,
    ) {
    }
}
