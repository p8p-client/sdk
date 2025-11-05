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

namespace P8p\Sdk\Schema\Apps\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.DaemonSetStatus')]
class DaemonSetStatus
{
    /**
     * @param int                                 $currentNumberScheduled The number of nodes that are running at least 1 daemon pod and are supposed to run the daemon pod. More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     * @param int                                 $desiredNumberScheduled The total number of nodes that should be running the daemon pod (including nodes correctly running the daemon pod). More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     * @param int                                 $numberMisscheduled     The number of nodes that are running the daemon pod, but are not supposed to run the daemon pod. More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     * @param int                                 $numberReady            numberReady is the number of nodes that should be running the daemon pod and have one or more of the daemon pod running with a Ready Condition
     * @param int|null                            $collisionCount         Count of hash collisions for the DaemonSet. The DaemonSet controller uses this field as a collision avoidance mechanism when it needs to create the name for the newest ControllerRevision.
     * @param array<int, DaemonSetCondition>|null $conditions             represents the latest available observations of a DaemonSet's current state
     * @param int|null                            $numberAvailable        The number of nodes that should be running the daemon pod and have one or more of the daemon pod running and available (ready for at least spec.minReadySeconds)
     * @param int|null                            $numberUnavailable      The number of nodes that should be running the daemon pod and have none of the daemon pod running and available (ready for at least spec.minReadySeconds)
     * @param int|null                            $observedGeneration     the most recent generation observed by the daemon set controller
     * @param int|null                            $updatedNumberScheduled The total number of nodes that are running updated daemon pod
     */
    public function __construct(
        public int $currentNumberScheduled,
        public int $desiredNumberScheduled,
        public int $numberMisscheduled,
        public int $numberReady,
        public ?int $collisionCount = null,
        public ?array $conditions = null,
        public ?int $numberAvailable = null,
        public ?int $numberUnavailable = null,
        public ?int $observedGeneration = null,
        public ?int $updatedNumberScheduled = null,
    ) {
    }
}
