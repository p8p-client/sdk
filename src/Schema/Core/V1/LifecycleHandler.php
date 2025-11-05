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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.LifecycleHandler')]
class LifecycleHandler
{
    /**
     * @param ExecAction|null      $exec      exec specifies a command to execute in the container
     * @param HTTPGetAction|null   $httpGet   HTTPGet specifies an HTTP GET request to perform
     * @param SleepAction|null     $sleep     sleep represents a duration that the container should sleep
     * @param TCPSocketAction|null $tcpSocket Deprecated. TCPSocket is NOT supported as a LifecycleHandler and kept for backward compatibility. There is no validation of this field and lifecycle hooks will fail at runtime when it is specified.
     */
    public function __construct(
        public ?ExecAction $exec = null,
        public ?HTTPGetAction $httpGet = null,
        public ?SleepAction $sleep = null,
        public ?TCPSocketAction $tcpSocket = null,
    ) {
    }
}
