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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeStatus')]
class NodeStatus
{
    /**
     * @param array<int, NodeAddress>|null    $addresses       List of addresses reachable to the node. Queried from cloud provider, if available. More info: https://kubernetes.io/docs/reference/node/node-status/#addresses Note: This field is declared as mergeable, but the merge key is not sufficiently unique, which can cause data corruption when it is merged. Callers should instead use a full-replacement patch. See https://pr.k8s.io/79391 for an example. Consumers should assume that addresses can change during the lifetime of a Node. However, there are some exceptions where this may not be possible, such as Pods that inherit a Node's address in its own status or consumers of the downward API (status.hostIP).
     * @param array<mixed>|null               $allocatable     Allocatable represents the resources of a node that are available for scheduling. Defaults to Capacity.
     * @param array<mixed>|null               $capacity        Capacity represents the total resources of a node. More info: https://kubernetes.io/docs/reference/node/node-status/#capacity
     * @param array<int, NodeCondition>|null  $conditions      Conditions is an array of current observed node conditions. More info: https://kubernetes.io/docs/reference/node/node-status/#condition
     * @param NodeConfigStatus|null           $config          status of the config assigned to the node via the dynamic Kubelet config feature
     * @param NodeDaemonEndpoints|null        $daemonEndpoints endpoints of daemons running on the Node
     * @param NodeFeatures|null               $features        features describes the set of features implemented by the CRI implementation
     * @param array<int, ContainerImage>|null $images          List of container images on this node
     * @param NodeSystemInfo|null             $nodeInfo        Set of ids/uuids to uniquely identify the node. More info: https://kubernetes.io/docs/reference/node/node-status/#info
     * @param string|null                     $phase           NodePhase is the recently observed lifecycle phase of the node. More info: https://kubernetes.io/docs/concepts/nodes/node/#phase The field is never populated, and now is deprecated.
     *
     * Possible enum values:
     *  - `"Pending"` means the node has been created/added by the system, but not configured.
     *  - `"Running"` means the node has been configured and has Kubernetes components running.
     *  - `"Terminated"` means the node has been removed from the cluster.
     * @param array<int, NodeRuntimeHandler>|null $runtimeHandlers the available runtime handlers
     * @param array<int, AttachedVolume>|null     $volumesAttached list of volumes that are attached to the node
     * @param array<int, string>|null             $volumesInUse    list of attachable volumes in use (mounted) by the node
     */
    public function __construct(
        public ?array $addresses = null,
        public ?array $allocatable = null,
        public ?array $capacity = null,
        public ?array $conditions = null,
        public ?NodeConfigStatus $config = null,
        public ?NodeDaemonEndpoints $daemonEndpoints = null,
        public ?NodeFeatures $features = null,
        public ?array $images = null,
        public ?NodeSystemInfo $nodeInfo = null,
        public ?string $phase = null,
        public ?array $runtimeHandlers = null,
        public ?array $volumesAttached = null,
        public ?array $volumesInUse = null,
    ) {
    }
}
