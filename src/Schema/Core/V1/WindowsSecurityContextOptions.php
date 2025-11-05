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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.WindowsSecurityContextOptions')]
class WindowsSecurityContextOptions
{
    /**
     * @param string|null $gmsaCredentialSpec     GMSACredentialSpec is where the GMSA admission webhook (https://github.com/kubernetes-sigs/windows-gmsa) inlines the contents of the GMSA credential spec named by the GMSACredentialSpecName field.
     * @param string|null $gmsaCredentialSpecName GMSACredentialSpecName is the name of the GMSA credential spec to use
     * @param bool|null   $hostProcess            HostProcess determines if a container should be run as a 'Host Process' container. All of a Pod's containers must have the same effective HostProcess value (it is not allowed to have a mix of HostProcess containers and non-HostProcess containers). In addition, if HostProcess is true then HostNetwork must also be set to true.
     * @param string|null $runAsUserName          The UserName in Windows to run the entrypoint of the container process. Defaults to the user specified in image metadata if unspecified. May also be set in PodSecurityContext. If set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence.
     */
    public function __construct(
        public ?string $gmsaCredentialSpec = null,
        public ?string $gmsaCredentialSpecName = null,
        public ?bool $hostProcess = null,
        public ?string $runAsUserName = null,
    ) {
    }
}
