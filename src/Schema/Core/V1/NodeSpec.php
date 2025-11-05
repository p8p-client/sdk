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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeSpec')]
class NodeSpec
{
    /**
     * @param NodeConfigSource|null   $configSource  Deprecated: Previously used to specify the source of the node's configuration for the DynamicKubeletConfig feature. This feature is removed.
     * @param string|null             $externalID    Deprecated. Not all kubelets will set this field. Remove field after 1.13. see: https://issues.k8s.io/61966
     * @param string|null             $podCIDR       podCIDR represents the pod IP range assigned to the node
     * @param array<int, string>|null $podCIDRs      podCIDRs represents the IP ranges assigned to the node for usage by Pods on that node. If this field is specified, the 0th entry must match the podCIDR field. It may contain at most 1 value for each of IPv4 and IPv6.
     * @param string|null             $providerID    ID of the node assigned by the cloud provider in the format: <ProviderName>://<ProviderSpecificNodeID>
     * @param array<int, Taint>|null  $taints        if specified, the node's taints
     * @param bool|null               $unschedulable Unschedulable controls node schedulability of new pods. By default, node is schedulable. More info: https://kubernetes.io/docs/concepts/nodes/node/#manual-node-administration
     */
    public function __construct(
        public ?NodeConfigSource $configSource = null,
        public ?string $externalID = null,
        public ?string $podCIDR = null,
        public ?array $podCIDRs = null,
        public ?string $providerID = null,
        public ?array $taints = null,
        public ?bool $unschedulable = null,
    ) {
    }
}
