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

class PodStatus
{
    /**
     * @param array<int, PodCondition>|null    $conditions                 Current service state of pod. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-conditions
     * @param array<int, ContainerStatus>|null $containerStatuses          Statuses of containers in this pod. Each container in the pod should have at most one status in this list, and all statuses should be for containers in the pod. However this is not enforced. If a status for a non-existent container is present in the list, or the list has duplicate names, the behavior of various Kubernetes components is not defined and those statuses might be ignored. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     * @param array<int, ContainerStatus>|null $ephemeralContainerStatuses Statuses for any ephemeral containers that have run in this pod. Each ephemeral container in the pod should have at most one status in this list, and all statuses should be for containers in the pod. However this is not enforced. If a status for a non-existent container is present in the list, or the list has duplicate names, the behavior of various Kubernetes components is not defined and those statuses might be ignored. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     * @param string|null                      $hostIP                     hostIP holds the IP address of the host to which the pod is assigned. Empty if the pod has not started yet. A pod can be assigned to a node that has a problem in kubelet which in turns mean that HostIP will not be updated even if there is a node is assigned to pod
     * @param array<int, HostIP>|null          $hostIPs                    hostIPs holds the IP addresses allocated to the host. If this field is specified, the first entry must match the hostIP field. This list is empty if the pod has not started yet. A pod can be assigned to a node that has a problem in kubelet which in turns means that HostIPs will not be updated even if there is a node is assigned to this pod.
     * @param array<int, ContainerStatus>|null $initContainerStatuses      Statuses of init containers in this pod. The most recent successful non-restartable init container will have ready = true, the most recently started container will have startTime set. Each init container in the pod should have at most one status in this list, and all statuses should be for containers in the pod. However this is not enforced. If a status for a non-existent container is present in the list, or the list has duplicate names, the behavior of various Kubernetes components is not defined and those statuses might be ignored. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#pod-and-container-status
     * @param string|null                      $message                    a human readable message indicating details about why the pod is in this condition
     * @param string|null                      $nominatedNodeName          nominatedNodeName is set only when this pod preempts other pods on the node, but it cannot be scheduled right away as preemption victims receive their graceful termination periods. This field does not guarantee that the pod will be scheduled on this node. Scheduler may decide to place the pod elsewhere if other nodes become available sooner. Scheduler may also decide to give the resources on this node to a higher priority pod that is created after preemption. As a result, this field may be different than PodSpec.nodeName when the pod is scheduled.
     * @param string|null                      $phase                      The phase of a Pod is a simple, high-level summary of where the Pod is in its lifecycle. The conditions array, the reason and message fields, and the individual container status arrays contain more detail about the pod's status. There are five possible phase values:
     *
     * Pending: The pod has been accepted by the Kubernetes system, but one or more of the container images has not been created. This includes time before being scheduled as well as time spent downloading images over the network, which could take a while. Running: The pod has been bound to a node, and all of the containers have been created. At least one container is still running, or is in the process of starting or restarting. Succeeded: All containers in the pod have terminated in success, and will not be restarted. Failed: All containers in the pod have terminated, and at least one container has terminated in failure. The container either exited with non-zero status or was terminated by the system. Unknown: For some reason the state of the pod could not be obtained, typically due to an error in communicating with the host of the pod.
     *
     * More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-phase
     *
     * Possible enum values:
     *  - `"Failed"` means that all containers in the pod have terminated, and at least one container has terminated in a failure (exited with a non-zero exit code or was stopped by the system).
     *  - `"Pending"` means the pod has been accepted by the system, but one or more of the containers has not been started. This includes time before being bound to a node, as well as time spent pulling images onto the host.
     *  - `"Running"` means the pod has been bound to a node and all of the containers have been started. At least one container is still running or is in the process of being restarted.
     *  - `"Succeeded"` means that all containers in the pod have voluntarily terminated with a container exit code of 0, and the system is not going to restart any of these containers.
     *  - `"Unknown"` means that for some reason the state of the pod could not be obtained, typically due to an error in communicating with the host of the pod. Deprecated: It isn't being set since 2015 (74da3b14b0c0f658b3bb8d2def5094686d0e9095)
     * @param string|null            $podIP    podIP address allocated to the pod. Routable at least within the cluster. Empty if not yet allocated.
     * @param array<int, PodIP>|null $podIPs   podIPs holds the IP addresses allocated to the pod. If this field is specified, the 0th entry must match the podIP field. Pods may be allocated at most 1 value for each of IPv4 and IPv6. This list is empty if no IPs have been allocated yet.
     * @param string|null            $qosClass The Quality of Service (QOS) classification assigned to the pod based on resource requirements See PodQOSClass type for available QOS classes More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-qos/#quality-of-service-classes
     *
     * Possible enum values:
     *  - `"BestEffort"` is the BestEffort qos class.
     *  - `"Burstable"` is the Burstable qos class.
     *  - `"Guaranteed"` is the Guaranteed qos class.
     * @param string|null                             $reason                A brief CamelCase message indicating details about why the pod is in this state. e.g. 'Evicted'
     * @param string|null                             $resize                Status of resources resize desired for pod's containers. It is empty if no resources resize is pending. Any changes to container resources will automatically set this to "Proposed"
     * @param array<int, PodResourceClaimStatus>|null $resourceClaimStatuses status of resource claims
     * @param \DateTime|null                          $startTime             RFC 3339 date and time at which the object was acknowledged by the Kubelet. This is before the Kubelet pulled the container image(s) for the pod.
     */
    public function __construct(
        public ?array $conditions = null,
        public ?array $containerStatuses = null,
        public ?array $ephemeralContainerStatuses = null,
        public ?string $hostIP = null,
        public ?array $hostIPs = null,
        public ?array $initContainerStatuses = null,
        public ?string $message = null,
        public ?string $nominatedNodeName = null,
        public ?string $phase = null,
        public ?string $podIP = null,
        public ?array $podIPs = null,
        public ?string $qosClass = null,
        public ?string $reason = null,
        public ?string $resize = null,
        public ?array $resourceClaimStatuses = null,
        public ?\DateTime $startTime = null,
    ) {
    }
}
