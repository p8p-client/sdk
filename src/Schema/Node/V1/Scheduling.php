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

namespace P8p\Sdk\Schema\Node\V1;

use P8p\Sdk\Schema\Core\V1\Toleration;

class Scheduling
{
    /**
     * @param array<mixed>|null           $nodeSelector nodeSelector lists labels that must be present on nodes that support this RuntimeClass. Pods using this RuntimeClass can only be scheduled to a node matched by this selector. The RuntimeClass nodeSelector is merged with a pod's existing nodeSelector. Any conflicts will cause the pod to be rejected in admission.
     * @param array<int, Toleration>|null $tolerations  tolerations are appended (excluding duplicates) to pods running with this RuntimeClass during admission, effectively unioning the set of nodes tolerated by the pod and the RuntimeClass
     */
    public function __construct(
        public ?array $nodeSelector = null,
        public ?array $tolerations = null,
    ) {
    }
}
