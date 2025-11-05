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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeRuntimeHandlerFeatures')]
class NodeRuntimeHandlerFeatures
{
    /**
     * @param bool|null $recursiveReadOnlyMounts recursiveReadOnlyMounts is set to true if the runtime handler supports RecursiveReadOnlyMounts
     * @param bool|null $userNamespaces          userNamespaces is set to true if the runtime handler supports UserNamespaces, including for volumes
     */
    public function __construct(
        public ?bool $recursiveReadOnlyMounts = null,
        public ?bool $userNamespaces = null,
    ) {
    }
}
