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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.NodeSystemInfo')]
class NodeSystemInfo
{
    /**
     * @param string $architecture            The Architecture reported by the node
     * @param string $bootID                  boot ID reported by the node
     * @param string $containerRuntimeVersion ContainerRuntime Version reported by the node through runtime remote API (e.g. containerd://1.4.2).
     * @param string $kernelVersion           Kernel Version reported by the node from 'uname -r' (e.g. 3.16.0-0.bpo.4-amd64).
     * @param string $kubeProxyVersion        deprecated: KubeProxy Version reported by the node
     * @param string $kubeletVersion          kubelet Version reported by the node
     * @param string $machineID               MachineID reported by the node. For unique machine identification in the cluster this field is preferred. Learn more from man(5) machine-id: http://man7.org/linux/man-pages/man5/machine-id.5.html
     * @param string $operatingSystem         The Operating System reported by the node
     * @param string $osImage                 OS Image reported by the node from /etc/os-release (e.g. Debian GNU/Linux 7 (wheezy)).
     * @param string $systemUUID              SystemUUID reported by the node. For unique machine identification MachineID is preferred. This field is specific to Red Hat hosts https://access.redhat.com/documentation/en-us/red_hat_subscription_management/1/html/rhsm/uuid
     */
    public function __construct(
        public string $architecture,
        public string $bootID,
        public string $containerRuntimeVersion,
        public string $kernelVersion,
        public string $kubeProxyVersion,
        public string $kubeletVersion,
        public string $machineID,
        public string $operatingSystem,
        public string $osImage,
        public string $systemUUID,
    ) {
    }
}
