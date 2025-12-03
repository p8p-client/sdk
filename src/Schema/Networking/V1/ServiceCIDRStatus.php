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

use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\Condition;

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.ServiceCIDRStatus')]
class ServiceCIDRStatus
{
    /**
     * @param array<int, Condition>|null $conditions conditions holds an array of metav1.Condition that describe the state of the ServiceCIDR. Current service state
     */
    public function __construct(
        public ?array $conditions = null,
    ) {
    }
}
