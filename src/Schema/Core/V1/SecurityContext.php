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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.SecurityContext')]
class SecurityContext
{
    /**
     * @param bool|null            $allowPrivilegeEscalation AllowPrivilegeEscalation controls whether a process can gain more privileges than its parent process. This bool directly controls if the no_new_privs flag will be set on the container process. AllowPrivilegeEscalation is true always when the container is: 1) run as Privileged 2) has CAP_SYS_ADMIN Note that this field cannot be set when spec.os.name is windows.
     * @param AppArmorProfile|null $appArmorProfile          appArmorProfile is the AppArmor options to use by this container. If set, this profile overrides the pod's appArmorProfile. Note that this field cannot be set when spec.os.name is windows.
     * @param Capabilities|null    $capabilities             The capabilities to add/drop when running containers. Defaults to the default set of capabilities granted by the container runtime. Note that this field cannot be set when spec.os.name is windows.
     * @param bool|null            $privileged               Run container in privileged mode. Processes in privileged containers are essentially equivalent to root on the host. Defaults to false. Note that this field cannot be set when spec.os.name is windows.
     * @param string|null          $procMount                procMount denotes the type of proc mount to use for the containers. The default value is Default which uses the container runtime defaults for readonly paths and masked paths. This requires the ProcMountType feature flag to be enabled. Note that this field cannot be set when spec.os.name is windows.
     *
     * Possible enum values:
     *  - `"Default"` uses the container runtime defaults for readonly and masked paths for /proc. Most container runtimes mask certain paths in /proc to avoid accidental security exposure of special devices or information.
     *  - `"Unmasked"` bypasses the default masking behavior of the container runtime and ensures the newly created /proc the container stays in tact with no modifications.
     * @param bool|null                          $readOnlyRootFilesystem Whether this container has a read-only root filesystem. Default is false. Note that this field cannot be set when spec.os.name is windows.
     * @param int|null                           $runAsGroup             The GID to run the entrypoint of the container process. Uses runtime default if unset. May also be set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name is windows.
     * @param bool|null                          $runAsNonRoot           Indicates that the container must run as a non-root user. If true, the Kubelet will validate the image at runtime to ensure that it does not run as UID 0 (root) and fail to start the container if it does. If unset or false, no such validation will be performed. May also be set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence.
     * @param int|null                           $runAsUser              The UID to run the entrypoint of the container process. Defaults to user specified in image metadata if unspecified. May also be set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name is windows.
     * @param SELinuxOptions|null                $seLinuxOptions         The SELinux context to be applied to the container. If unspecified, the container runtime will allocate a random SELinux context for each container.  May also be set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name is windows.
     * @param SeccompProfile|null                $seccompProfile         The seccomp options to use by this container. If seccomp options are provided at both the pod & container level, the container options override the pod options. Note that this field cannot be set when spec.os.name is windows.
     * @param WindowsSecurityContextOptions|null $windowsOptions         The Windows specific settings applied to all containers. If unspecified, the options from the PodSecurityContext will be used. If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name is linux.
     */
    public function __construct(
        public ?bool $allowPrivilegeEscalation = null,
        public ?AppArmorProfile $appArmorProfile = null,
        public ?Capabilities $capabilities = null,
        public ?bool $privileged = null,
        public ?string $procMount = null,
        public ?bool $readOnlyRootFilesystem = null,
        public ?int $runAsGroup = null,
        public ?bool $runAsNonRoot = null,
        public ?int $runAsUser = null,
        public ?SELinuxOptions $seLinuxOptions = null,
        public ?SeccompProfile $seccompProfile = null,
        public ?WindowsSecurityContextOptions $windowsOptions = null,
    ) {
    }
}
