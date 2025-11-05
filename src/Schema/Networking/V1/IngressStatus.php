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

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.IngressStatus')]
class IngressStatus
{
    /**
     * @param IngressLoadBalancerStatus|null $loadBalancer loadBalancer contains the current status of the load-balancer
     */
    public function __construct(
        public ?IngressLoadBalancerStatus $loadBalancer = null,
    ) {
    }
}
