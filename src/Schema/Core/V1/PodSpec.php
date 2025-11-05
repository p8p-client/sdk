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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PodSpec')]
class PodSpec
{
    /**
     * @param array<int, Container> $containers                   List of containers belonging to the pod. Containers cannot currently be added or removed. There must be at least one container in a Pod. Cannot be updated.
     * @param int|null              $activeDeadlineSeconds        Optional duration in seconds the pod may be active on the node relative to StartTime before the system will actively try to mark it failed and kill associated containers. Value must be a positive integer.
     * @param Affinity|null         $affinity                     If specified, the pod's scheduling constraints
     * @param bool|null             $automountServiceAccountToken automountServiceAccountToken indicates whether a service account token should be automatically mounted
     * @param PodDNSConfig|null     $dnsConfig                    Specifies the DNS parameters of a pod. Parameters specified here will be merged to the generated DNS configuration based on DNSPolicy.
     * @param string|null           $dnsPolicy                    Set DNS policy for the pod. Defaults to "ClusterFirst". Valid values are 'ClusterFirstWithHostNet', 'ClusterFirst', 'Default' or 'None'. DNS parameters given in DNSConfig will be merged with the policy selected with DNSPolicy. To have DNS options set along with hostNetwork, you have to specify DNS policy explicitly to 'ClusterFirstWithHostNet'.
     *
     * Possible enum values:
     *  - `"ClusterFirst"` indicates that the pod should use cluster DNS first unless hostNetwork is true, if it is available, then fall back on the default (as determined by kubelet) DNS settings.
     *  - `"ClusterFirstWithHostNet"` indicates that the pod should use cluster DNS first, if it is available, then fall back on the default (as determined by kubelet) DNS settings.
     *  - `"Default"` indicates that the pod should use the default (as determined by kubelet) DNS settings.
     *  - `"None"` indicates that the pod should use empty DNS settings. DNS parameters such as nameservers and search paths should be defined via DNSConfig.
     * @param bool|null                             $enableServiceLinks  EnableServiceLinks indicates whether information about services should be injected into pod's environment variables, matching the syntax of Docker links. Optional: Defaults to true.
     * @param array<int, EphemeralContainer>|null   $ephemeralContainers List of ephemeral containers run in this pod. Ephemeral containers may be run in an existing pod to perform user-initiated actions such as debugging. This list cannot be specified when creating a pod, and it cannot be modified by updating the pod spec. In order to add an ephemeral container to an existing pod, use the pod's ephemeralcontainers subresource.
     * @param array<int, HostAlias>|null            $hostAliases         hostAliases is an optional list of hosts and IPs that will be injected into the pod's hosts file if specified
     * @param bool|null                             $hostIPC             Use the host's ipc namespace. Optional: Default to false.
     * @param bool|null                             $hostNetwork         Host networking requested for this pod. Use the host's network namespace. If this option is set, the ports that will be used must be specified. Default to false.
     * @param bool|null                             $hostPID             Use the host's pid namespace. Optional: Default to false.
     * @param bool|null                             $hostUsers           Use the host's user namespace. Optional: Default to true. If set to true or not present, the pod will be run in the host user namespace, useful for when the pod needs a feature only available to the host user namespace, such as loading a kernel module with CAP_SYS_MODULE. When set to false, a new userns is created for the pod. Setting false is useful for mitigating container breakout vulnerabilities even allowing users to run their containers as root without actually having root privileges on the host. This field is alpha-level and is only honored by servers that enable the UserNamespacesSupport feature.
     * @param string|null                           $hostname            specifies the hostname of the Pod If not specified, the pod's hostname will be set to a system-defined value
     * @param array<int, LocalObjectReference>|null $imagePullSecrets    ImagePullSecrets is an optional list of references to secrets in the same namespace to use for pulling any of the images used by this PodSpec. If specified, these secrets will be passed to individual puller implementations for them to use. More info: https://kubernetes.io/docs/concepts/containers/images#specifying-imagepullsecrets-on-a-pod
     * @param array<int, Container>|null            $initContainers      List of initialization containers belonging to the pod. Init containers are executed in order prior to containers being started. If any init container fails, the pod is considered to have failed and is handled according to its restartPolicy. The name for an init container or normal container must be unique among all containers. Init containers may not have Lifecycle actions, Readiness probes, Liveness probes, or Startup probes. The resourceRequirements of an init container are taken into account during scheduling by finding the highest request/limit for each resource type, and then using the max of of that value or the sum of the normal containers. Limits are applied to init containers in a similar fashion. Init containers cannot currently be added or removed. Cannot be updated. More info: https://kubernetes.io/docs/concepts/workloads/pods/init-containers/
     * @param string|null                           $nodeName            NodeName indicates in which node this pod is scheduled. If empty, this pod is a candidate for scheduling by the scheduler defined in schedulerName. Once this field is set, the kubelet for this node becomes responsible for the lifecycle of this pod. This field should not be used to express a desire for the pod to be scheduled on a specific node. https://kubernetes.io/docs/concepts/scheduling-eviction/assign-pod-node/#nodename
     * @param array<mixed>|null                     $nodeSelector        NodeSelector is a selector which must be true for the pod to fit on a node. Selector which must match a node's labels for the pod to be scheduled on that node. More info: https://kubernetes.io/docs/concepts/configuration/assign-pod-node/
     * @param PodOS|null                            $os                  Specifies the OS of the containers in the pod. Some pod and container fields are restricted if this is set.
     *
     * If the OS field is set to linux, the following fields must be unset: -securityContext.windowsOptions
     *
     * If the OS field is set to windows, following fields must be unset: - spec.hostPID - spec.hostIPC - spec.hostUsers - spec.securityContext.appArmorProfile - spec.securityContext.seLinuxOptions - spec.securityContext.seccompProfile - spec.securityContext.fsGroup - spec.securityContext.fsGroupChangePolicy - spec.securityContext.sysctls - spec.shareProcessNamespace - spec.securityContext.runAsUser - spec.securityContext.runAsGroup - spec.securityContext.supplementalGroups - spec.securityContext.supplementalGroupsPolicy - spec.containers[*].securityContext.appArmorProfile - spec.containers[*].securityContext.seLinuxOptions - spec.containers[*].securityContext.seccompProfile - spec.containers[*].securityContext.capabilities - spec.containers[*].securityContext.readOnlyRootFilesystem - spec.containers[*].securityContext.privileged - spec.containers[*].securityContext.allowPrivilegeEscalation - spec.containers[*].securityContext.procMount - spec.containers[*].securityContext.runAsUser - spec.containers[*].securityContext.runAsGroup
     * @param array<mixed>|null $overhead         Overhead represents the resource overhead associated with running a pod for a given RuntimeClass. This field will be autopopulated at admission time by the RuntimeClass admission controller. If the RuntimeClass admission controller is enabled, overhead must not be set in Pod create requests. The RuntimeClass admission controller will reject Pod create requests which have the overhead already set. If RuntimeClass is configured and selected in the PodSpec, Overhead will be set to the value defined in the corresponding RuntimeClass, otherwise it will remain unset and treated as zero. More info: https://git.k8s.io/enhancements/keps/sig-node/688-pod-overhead/README.md
     * @param string|null       $preemptionPolicy PreemptionPolicy is the Policy for preempting pods with lower priority. One of Never, PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     *
     * Possible enum values:
     *  - `"Never"` means that pod never preempts other pods with lower priority.
     *  - `"PreemptLowerPriority"` means that pod can preempt other pods with lower priority.
     * @param int|null                          $priority          The priority value. Various system components use this field to find the priority of the pod. When Priority Admission Controller is enabled, it prevents users from setting this field. The admission controller populates this field from PriorityClassName. The higher the value, the higher the priority.
     * @param string|null                       $priorityClassName If specified, indicates the pod's priority. "system-node-critical" and "system-cluster-critical" are two special keywords which indicate the highest priorities with the former being the highest priority. Any other name must be defined by creating a PriorityClass object with that name. If not specified, the pod priority will be default or zero if there is no default.
     * @param array<int, PodReadinessGate>|null $readinessGates    If specified, all readiness gates will be evaluated for pod readiness. A pod is ready when all its containers are ready AND all conditions specified in the readiness gates have status equal to "True" More info: https://git.k8s.io/enhancements/keps/sig-network/580-pod-readiness-gates
     * @param array<int, PodResourceClaim>|null $resourceClaims    ResourceClaims defines which ResourceClaims must be allocated and reserved before the Pod is allowed to start. The resources will be made available to those containers which consume them by name.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable.
     * @param ResourceRequirements|null $resources Resources is the total amount of CPU and Memory resources required by all containers in the pod. It supports specifying Requests and Limits for "cpu" and "memory" resource names only. ResourceClaims are not supported.
     *
     * This field enables fine-grained control over resource allocation for the entire pod, allowing resource sharing among containers in a pod.
     *
     * This is an alpha field and requires enabling the PodLevelResources feature gate.
     * @param string|null $restartPolicy Restart policy for all containers within the pod. One of Always, OnFailure, Never. In some contexts, only a subset of those values may be permitted. Default to Always. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#restart-policy
     *
     * Possible enum values:
     *  - `"Always"`
     *  - `"Never"`
     *  - `"OnFailure"`
     * @param string|null                        $runtimeClassName RuntimeClassName refers to a RuntimeClass object in the node.k8s.io group, which should be used to run this pod.  If no RuntimeClass resource matches the named class, the pod will not be run. If unset or empty, the "legacy" RuntimeClass will be used, which is an implicit class with an empty definition that uses the default runtime handler. More info: https://git.k8s.io/enhancements/keps/sig-node/585-runtime-class
     * @param string|null                        $schedulerName    If specified, the pod will be dispatched by specified scheduler. If not specified, the pod will be dispatched by default scheduler.
     * @param array<int, PodSchedulingGate>|null $schedulingGates  SchedulingGates is an opaque list of values that if specified will block scheduling the pod. If schedulingGates is not empty, the pod will stay in the SchedulingGated state and the scheduler will not attempt to schedule the pod.
     *
     * SchedulingGates can only be set at pod creation time, and be removed only afterwards.
     * @param PodSecurityContext|null                   $securityContext               SecurityContext holds pod-level security attributes and common container settings. Optional: Defaults to empty.  See type description for default values of each field.
     * @param string|null                               $serviceAccount                DeprecatedServiceAccount is a deprecated alias for ServiceAccountName. Deprecated: Use serviceAccountName instead.
     * @param string|null                               $serviceAccountName            ServiceAccountName is the name of the ServiceAccount to use to run this pod. More info: https://kubernetes.io/docs/tasks/configure-pod-container/configure-service-account/
     * @param bool|null                                 $setHostnameAsFQDN             If true the pod's hostname will be configured as the pod's FQDN, rather than the leaf name (the default). In Linux containers, this means setting the FQDN in the hostname field of the kernel (the nodename field of struct utsname). In Windows containers, this means setting the registry value of hostname for the registry key HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\Tcpip\\Parameters to FQDN. If a pod does not have FQDN, this has no effect. Default to false.
     * @param bool|null                                 $shareProcessNamespace         Share a single process namespace between all of the containers in a pod. When this is set containers will be able to view and signal processes from other containers in the same pod, and the first process in each container will not be assigned PID 1. HostPID and ShareProcessNamespace cannot both be set. Optional: Default to false.
     * @param string|null                               $subdomain                     If specified, the fully qualified Pod hostname will be "<hostname>.<subdomain>.<pod namespace>.svc.<cluster domain>". If not specified, the pod will not have a domainname at all.
     * @param int|null                                  $terminationGracePeriodSeconds Optional duration in seconds the pod needs to terminate gracefully. May be decreased in delete request. Value must be non-negative integer. The value zero indicates stop immediately via the kill signal (no opportunity to shut down). If this value is nil, the default grace period will be used instead. The grace period is the duration in seconds after the processes running in the pod are sent a termination signal and the time when the processes are forcibly halted with a kill signal. Set this value longer than the expected cleanup time for your process. Defaults to 30 seconds.
     * @param array<int, Toleration>|null               $tolerations                   if specified, the pod's tolerations
     * @param array<int, TopologySpreadConstraint>|null $topologySpreadConstraints     TopologySpreadConstraints describes how a group of pods ought to spread across topology domains. Scheduler will schedule pods in a way which abides by the constraints. All topologySpreadConstraints are ANDed.
     * @param array<int, Volume>|null                   $volumes                       List of volumes that can be mounted by containers belonging to the pod. More info: https://kubernetes.io/docs/concepts/storage/volumes
     */
    public function __construct(
        public array $containers,
        public ?int $activeDeadlineSeconds = null,
        public ?Affinity $affinity = null,
        public ?bool $automountServiceAccountToken = null,
        public ?PodDNSConfig $dnsConfig = null,
        public ?string $dnsPolicy = null,
        public ?bool $enableServiceLinks = null,
        public ?array $ephemeralContainers = null,
        public ?array $hostAliases = null,
        public ?bool $hostIPC = null,
        public ?bool $hostNetwork = null,
        public ?bool $hostPID = null,
        public ?bool $hostUsers = null,
        public ?string $hostname = null,
        public ?array $imagePullSecrets = null,
        public ?array $initContainers = null,
        public ?string $nodeName = null,
        public ?array $nodeSelector = null,
        public ?PodOS $os = null,
        public ?array $overhead = null,
        public ?string $preemptionPolicy = null,
        public ?int $priority = null,
        public ?string $priorityClassName = null,
        public ?array $readinessGates = null,
        public ?array $resourceClaims = null,
        public ?ResourceRequirements $resources = null,
        public ?string $restartPolicy = null,
        public ?string $runtimeClassName = null,
        public ?string $schedulerName = null,
        public ?array $schedulingGates = null,
        public ?PodSecurityContext $securityContext = null,
        public ?string $serviceAccount = null,
        public ?string $serviceAccountName = null,
        public ?bool $setHostnameAsFQDN = null,
        public ?bool $shareProcessNamespace = null,
        public ?string $subdomain = null,
        public ?int $terminationGracePeriodSeconds = null,
        public ?array $tolerations = null,
        public ?array $topologySpreadConstraints = null,
        public ?array $volumes = null,
    ) {
    }
}
