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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ContainerStatus')]
class ContainerStatus
{
    /**
     * @param string $image   Image is the name of container image that the container is running. The container image may not match the image used in the PodSpec, as it may have been resolved by the runtime. More info: https://kubernetes.io/docs/concepts/containers/images.
     * @param string $imageID ImageID is the image ID of the container's image. The image ID may not match the image ID of the image used in the PodSpec, as it may have been resolved by the runtime.
     * @param string $name    Name is a DNS_LABEL representing the unique name of the container. Each container in a pod must have a unique name across all container types. Cannot be updated.
     * @param bool   $ready   Ready specifies whether the container is currently passing its readiness check. The value will change as readiness probes keep executing. If no readiness probes are specified, this field defaults to true once the container is fully started (see Started field).
     *
     * The value is typically used to determine whether a container is ready to accept traffic.
     * @param int                                $restartCount             RestartCount holds the number of times the container has been restarted. Kubelet makes an effort to always increment the value, but there are cases when the state may be lost due to node restarts and then the value may be reset to 0. The value is never negative.
     * @param array<mixed>|null                  $allocatedResources       AllocatedResources represents the compute resources allocated for this container by the node. Kubelet sets this value to Container.Resources.Requests upon successful pod admission and after successfully admitting desired pod resize.
     * @param array<int, ResourceStatus>|null    $allocatedResourcesStatus allocatedResourcesStatus represents the status of various resources allocated for this Pod
     * @param string|null                        $containerID              ContainerID is the ID of the container in the format '<type>://<container_id>'. Where type is a container runtime identifier, returned from Version call of CRI API (for example "containerd").
     * @param ContainerState|null                $lastState                LastTerminationState holds the last termination state of the container to help debug container crashes and restarts. This field is not populated if the container is still running and RestartCount is 0.
     * @param ResourceRequirements|null          $resources                resources represents the compute resource requests and limits that have been successfully enacted on the running container after it has been started or has been successfully resized
     * @param bool|null                          $started                  Started indicates whether the container has finished its postStart lifecycle hook and passed its startup probe. Initialized as false, becomes true after startupProbe is considered successful. Resets to false when the container is restarted, or if kubelet loses state temporarily. In both cases, startup probes will run again. Is always true when no startupProbe is defined and container is running and has passed the postStart lifecycle hook. The null value must be treated the same as false.
     * @param ContainerState|null                $state                    state holds details about the container's current condition
     * @param ContainerUser|null                 $user                     User represents user identity information initially attached to the first process of the container
     * @param array<int, VolumeMountStatus>|null $volumeMounts             status of volume mounts
     */
    public function __construct(
        public string $image,
        public string $imageID,
        public string $name,
        public bool $ready,
        public int $restartCount,
        public ?array $allocatedResources = null,
        public ?array $allocatedResourcesStatus = null,
        public ?string $containerID = null,
        public ?ContainerState $lastState = null,
        public ?ResourceRequirements $resources = null,
        public ?bool $started = null,
        public ?ContainerState $state = null,
        public ?ContainerUser $user = null,
        public ?array $volumeMounts = null,
    ) {
    }
}
