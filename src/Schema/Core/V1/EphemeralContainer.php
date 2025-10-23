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

class EphemeralContainer
{
    /**
     * @param string                         $name            Name of the ephemeral container specified as a DNS_LABEL. This name must be unique among all containers, init containers and ephemeral containers.
     * @param array<int, string>|null        $args            Arguments to the entrypoint. The image's CMD is used if this is not provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a variable cannot be resolved, the reference in the input string will be unchanged. Double $$ are reduced to a single $, which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable exists or not. Cannot be updated. More info: https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     * @param array<int, string>|null        $command         Entrypoint array. Not executed within a shell. The image's ENTRYPOINT is used if this is not provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a variable cannot be resolved, the reference in the input string will be unchanged. Double $$ are reduced to a single $, which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable exists or not. Cannot be updated. More info: https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     * @param array<int, EnvVar>|null        $env             List of environment variables to set in the container. Cannot be updated.
     * @param array<int, EnvFromSource>|null $envFrom         List of sources to populate environment variables in the container. The keys defined within a source must be a C_IDENTIFIER. All invalid keys will be reported as an event when the container is starting. When a key exists in multiple sources, the value associated with the last source will take precedence. Values defined by an Env with a duplicate key will take precedence. Cannot be updated.
     * @param string|null                    $image           Container image name. More info: https://kubernetes.io/docs/concepts/containers/images
     * @param string|null                    $imagePullPolicy Image pull policy. One of Always, Never, IfNotPresent. Defaults to Always if :latest tag is specified, or IfNotPresent otherwise. Cannot be updated. More info: https://kubernetes.io/docs/concepts/containers/images#updating-images
     *
     * Possible enum values:
     *  - `"Always"` means that kubelet always attempts to pull the latest image. Container will fail If the pull fails.
     *  - `"IfNotPresent"` means that kubelet pulls if the image isn't present on disk. Container will fail if the image isn't present and the pull fails.
     *  - `"Never"` means that kubelet never pulls an image, but only uses a local image. Container will fail if the image isn't present
     * @param Lifecycle|null                         $lifecycle           lifecycle is not allowed for ephemeral containers
     * @param Probe|null                             $livenessProbe       probes are not allowed for ephemeral containers
     * @param array<int, ContainerPort>|null         $ports               ports are not allowed for ephemeral containers
     * @param Probe|null                             $readinessProbe      probes are not allowed for ephemeral containers
     * @param array<int, ContainerResizePolicy>|null $resizePolicy        resources resize policy for the container
     * @param ResourceRequirements|null              $resources           Resources are not allowed for ephemeral containers. Ephemeral containers use spare resources already allocated to the pod.
     * @param string|null                            $restartPolicy       Restart policy for the container to manage the restart behavior of each container within a pod. This may only be set for init containers. You cannot set this field on ephemeral containers.
     * @param SecurityContext|null                   $securityContext     Optional: SecurityContext defines the security options the ephemeral container should be run with. If set, the fields of SecurityContext override the equivalent fields of PodSecurityContext.
     * @param Probe|null                             $startupProbe        probes are not allowed for ephemeral containers
     * @param bool|null                              $stdin               Whether this container should allocate a buffer for stdin in the container runtime. If this is not set, reads from stdin in the container will always result in EOF. Default is false.
     * @param bool|null                              $stdinOnce           Whether the container runtime should close the stdin channel after it has been opened by a single attach. When stdin is true the stdin stream will remain open across multiple attach sessions. If stdinOnce is set to true, stdin is opened on container start, is empty until the first client attaches to stdin, and then remains open and accepts data until the client disconnects, at which time stdin is closed and remains closed until the container is restarted. If this flag is false, a container processes that reads from stdin will never receive an EOF. Default is false
     * @param string|null                            $targetContainerName If set, the name of the container from PodSpec that this ephemeral container targets. The ephemeral container will be run in the namespaces (IPC, PID, etc) of this container. If not set then the ephemeral container uses the namespaces configured in the Pod spec.
     *
     * The container runtime must implement support for this feature. If the runtime does not support namespace targeting then the result of setting this field is undefined.
     * @param string|null $terminationMessagePath   Optional: Path at which the file to which the container's termination message will be written is mounted into the container's filesystem. Message written is intended to be brief final status, such as an assertion failure message. Will be truncated by the node if greater than 4096 bytes. The total message length across all containers will be limited to 12kb. Defaults to /dev/termination-log. Cannot be updated.
     * @param string|null $terminationMessagePolicy Indicate how the termination message should be populated. File will use the contents of terminationMessagePath to populate the container status message on both success and failure. FallbackToLogsOnError will use the last chunk of container log output if the termination message file is empty and the container exited with an error. The log output is limited to 2048 bytes or 80 lines, whichever is smaller. Defaults to File. Cannot be updated.
     *
     * Possible enum values:
     *  - `"FallbackToLogsOnError"` will read the most recent contents of the container logs for the container status message when the container exits with an error and the terminationMessagePath has no contents.
     *  - `"File"` is the default behavior and will set the container status message to the contents of the container's terminationMessagePath when the container exits.
     * @param bool|null                     $tty           Whether this container should allocate a TTY for itself, also requires 'stdin' to be true. Default is false.
     * @param array<int, VolumeDevice>|null $volumeDevices volumeDevices is the list of block devices to be used by the container
     * @param array<int, VolumeMount>|null  $volumeMounts  Pod volumes to mount into the container's filesystem. Subpath mounts are not allowed for ephemeral containers. Cannot be updated.
     * @param string|null                   $workingDir    Container's working directory. If not specified, the container runtime's default will be used, which might be configured in the container image. Cannot be updated.
     */
    public function __construct(
        public string $name,
        public ?array $args = null,
        public ?array $command = null,
        public ?array $env = null,
        public ?array $envFrom = null,
        public ?string $image = null,
        public ?string $imagePullPolicy = null,
        public ?Lifecycle $lifecycle = null,
        public ?Probe $livenessProbe = null,
        public ?array $ports = null,
        public ?Probe $readinessProbe = null,
        public ?array $resizePolicy = null,
        public ?ResourceRequirements $resources = null,
        public ?string $restartPolicy = null,
        public ?SecurityContext $securityContext = null,
        public ?Probe $startupProbe = null,
        public ?bool $stdin = null,
        public ?bool $stdinOnce = null,
        public ?string $targetContainerName = null,
        public ?string $terminationMessagePath = null,
        public ?string $terminationMessagePolicy = null,
        public ?bool $tty = null,
        public ?array $volumeDevices = null,
        public ?array $volumeMounts = null,
        public ?string $workingDir = null,
    ) {
    }
}
