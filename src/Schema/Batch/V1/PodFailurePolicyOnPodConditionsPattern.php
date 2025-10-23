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

namespace P8p\Sdk\Schema\Batch\V1;

class PodFailurePolicyOnPodConditionsPattern
{
    /**
     * @param string $status Specifies the required Pod condition status. To match a pod condition it is required that the specified status equals the pod condition status. Defaults to True.
     * @param string $type   Specifies the required Pod condition type. To match a pod condition it is required that specified type equals the pod condition type.
     */
    public function __construct(
        public string $status,
        public string $type,
    ) {
    }
}
