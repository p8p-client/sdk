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

namespace P8p\Sdk\Schema\FlowcontrolApiserver\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.FlowDistinguisherMethod')]
class FlowDistinguisherMethod
{
    /**
     * @param string $type `type` is the type of flow distinguisher method The supported types are "ByUser" and "ByNamespace". Required.
     */
    public function __construct(
        public string $type,
    ) {
    }
}
