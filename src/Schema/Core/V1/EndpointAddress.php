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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.EndpointAddress')]
class EndpointAddress
{
    /**
     * @param string               $ip        The IP of this endpoint. May not be loopback (127.0.0.0/8 or ::1), link-local (169.254.0.0/16 or fe80::/10), or link-local multicast (224.0.0.0/24 or ff02::/16).
     * @param string|null          $hostname  The Hostname of this endpoint
     * @param string|null          $nodeName  Optional: Node hosting this endpoint. This can be used to determine endpoints local to a node.
     * @param ObjectReference|null $targetRef reference to object providing the endpoint
     */
    public function __construct(
        public string $ip,
        public ?string $hostname = null,
        public ?string $nodeName = null,
        public ?ObjectReference $targetRef = null,
    ) {
    }
}
