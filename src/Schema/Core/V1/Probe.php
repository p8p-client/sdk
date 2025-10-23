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

class Probe
{
    /**
     * @param ExecAction|null      $exec                          exec specifies a command to execute in the container
     * @param int|null             $failureThreshold              Minimum consecutive failures for the probe to be considered failed after having succeeded. Defaults to 3. Minimum value is 1.
     * @param GRPCAction|null      $grpc                          GRPC specifies a GRPC HealthCheckRequest
     * @param HTTPGetAction|null   $httpGet                       HTTPGet specifies an HTTP GET request to perform
     * @param int|null             $initialDelaySeconds           Number of seconds after the container has started before liveness probes are initiated. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     * @param int|null             $periodSeconds                 How often (in seconds) to perform the probe. Default to 10 seconds. Minimum value is 1.
     * @param int|null             $successThreshold              Minimum consecutive successes for the probe to be considered successful after having failed. Defaults to 1. Must be 1 for liveness and startup. Minimum value is 1.
     * @param TCPSocketAction|null $tcpSocket                     TCPSocket specifies a connection to a TCP port
     * @param int|null             $terminationGracePeriodSeconds Optional duration in seconds the pod needs to terminate gracefully upon probe failure. The grace period is the duration in seconds after the processes running in the pod are sent a termination signal and the time when the processes are forcibly halted with a kill signal. Set this value longer than the expected cleanup time for your process. If this value is nil, the pod's terminationGracePeriodSeconds will be used. Otherwise, this value overrides the value provided by the pod spec. Value must be non-negative integer. The value zero indicates stop immediately via the kill signal (no opportunity to shut down). This is a beta field and requires enabling ProbeTerminationGracePeriod feature gate. Minimum value is 1. spec.terminationGracePeriodSeconds is used if unset.
     * @param int|null             $timeoutSeconds                Number of seconds after which the probe times out. Defaults to 1 second. Minimum value is 1. More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function __construct(
        public ?ExecAction $exec = null,
        public ?int $failureThreshold = null,
        public ?GRPCAction $grpc = null,
        public ?HTTPGetAction $httpGet = null,
        public ?int $initialDelaySeconds = null,
        public ?int $periodSeconds = null,
        public ?int $successThreshold = null,
        public ?TCPSocketAction $tcpSocket = null,
        public ?int $terminationGracePeriodSeconds = null,
        public ?int $timeoutSeconds = null,
    ) {
    }
}
