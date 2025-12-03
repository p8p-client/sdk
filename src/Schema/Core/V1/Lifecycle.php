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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.Lifecycle')]
class Lifecycle
{
    /**
     * @param LifecycleHandler|null $postStart  PostStart is called immediately after a container is created. If the handler fails, the container is terminated and restarted according to its restart policy. Other management of the container blocks until the hook completes. More info: https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     * @param LifecycleHandler|null $preStop    PreStop is called immediately before a container is terminated due to an API request or management event such as liveness/startup probe failure, preemption, resource contention, etc. The handler is not called if the container crashes or exits. The Pod's termination grace period countdown begins before the PreStop hook is executed. Regardless of the outcome of the handler, the container will eventually terminate within the Pod's termination grace period (unless delayed by finalizers). Other management of the container blocks until the hook completes or until the termination grace period is reached. More info: https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     * @param string|null           $stopSignal StopSignal defines which signal will be sent to a container when it is being stopped. If not specified, the default is defined by the container runtime in use. StopSignal can only be set for Pods with a non-empty .spec.os.name
     *
     * Possible enum values:
     *  - `"SIGABRT"`
     *  - `"SIGALRM"`
     *  - `"SIGBUS"`
     *  - `"SIGCHLD"`
     *  - `"SIGCLD"`
     *  - `"SIGCONT"`
     *  - `"SIGFPE"`
     *  - `"SIGHUP"`
     *  - `"SIGILL"`
     *  - `"SIGINT"`
     *  - `"SIGIO"`
     *  - `"SIGIOT"`
     *  - `"SIGKILL"`
     *  - `"SIGPIPE"`
     *  - `"SIGPOLL"`
     *  - `"SIGPROF"`
     *  - `"SIGPWR"`
     *  - `"SIGQUIT"`
     *  - `"SIGRTMAX"`
     *  - `"SIGRTMAX-1"`
     *  - `"SIGRTMAX-10"`
     *  - `"SIGRTMAX-11"`
     *  - `"SIGRTMAX-12"`
     *  - `"SIGRTMAX-13"`
     *  - `"SIGRTMAX-14"`
     *  - `"SIGRTMAX-2"`
     *  - `"SIGRTMAX-3"`
     *  - `"SIGRTMAX-4"`
     *  - `"SIGRTMAX-5"`
     *  - `"SIGRTMAX-6"`
     *  - `"SIGRTMAX-7"`
     *  - `"SIGRTMAX-8"`
     *  - `"SIGRTMAX-9"`
     *  - `"SIGRTMIN"`
     *  - `"SIGRTMIN+1"`
     *  - `"SIGRTMIN+10"`
     *  - `"SIGRTMIN+11"`
     *  - `"SIGRTMIN+12"`
     *  - `"SIGRTMIN+13"`
     *  - `"SIGRTMIN+14"`
     *  - `"SIGRTMIN+15"`
     *  - `"SIGRTMIN+2"`
     *  - `"SIGRTMIN+3"`
     *  - `"SIGRTMIN+4"`
     *  - `"SIGRTMIN+5"`
     *  - `"SIGRTMIN+6"`
     *  - `"SIGRTMIN+7"`
     *  - `"SIGRTMIN+8"`
     *  - `"SIGRTMIN+9"`
     *  - `"SIGSEGV"`
     *  - `"SIGSTKFLT"`
     *  - `"SIGSTOP"`
     *  - `"SIGSYS"`
     *  - `"SIGTERM"`
     *  - `"SIGTRAP"`
     *  - `"SIGTSTP"`
     *  - `"SIGTTIN"`
     *  - `"SIGTTOU"`
     *  - `"SIGURG"`
     *  - `"SIGUSR1"`
     *  - `"SIGUSR2"`
     *  - `"SIGVTALRM"`
     *  - `"SIGWINCH"`
     *  - `"SIGXCPU"`
     *  - `"SIGXFSZ"`
     */
    public function __construct(
        public ?LifecycleHandler $postStart = null,
        public ?LifecycleHandler $preStop = null,
        public ?string $stopSignal = null,
    ) {
    }
}
