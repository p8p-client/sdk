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

use P8p\Sdk\Schema\Meta\V1\LabelSelector;

class NetworkPolicyPeer
{
    /**
     * @param IPBlock|null       $ipBlock           ipBlock defines policy on a particular IPBlock. If this field is set then neither of the other fields can be.
     * @param LabelSelector|null $namespaceSelector namespaceSelector selects namespaces using cluster-scoped labels. This field follows standard label selector semantics; if present but empty, it selects all namespaces.
     *
     * If podSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching podSelector in the namespaces selected by namespaceSelector. Otherwise it selects all pods in the namespaces selected by namespaceSelector.
     * @param LabelSelector|null $podSelector podSelector is a label selector which selects pods. This field follows standard label selector semantics; if present but empty, it selects all pods.
     *
     * If namespaceSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching podSelector in the Namespaces selected by NamespaceSelector. Otherwise it selects the pods matching podSelector in the policy's own namespace.
     */
    public function __construct(
        public ?IPBlock $ipBlock = null,
        public ?LabelSelector $namespaceSelector = null,
        public ?LabelSelector $podSelector = null,
    ) {
    }
}
