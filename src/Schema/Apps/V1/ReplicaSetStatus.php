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

class ReplicaSetStatus
{
    /**
     * @param int                                  $replicas             Replicas is the most recently observed number of replicas. More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller/#what-is-a-replicationcontroller
     * @param int|null                             $availableReplicas    the number of available replicas (ready for at least minReadySeconds) for this replica set
     * @param array<int, ReplicaSetCondition>|null $conditions           represents the latest available observations of a replica set's current state
     * @param int|null                             $fullyLabeledReplicas the number of pods that have labels matching the labels of the pod template of the replicaset
     * @param int|null                             $observedGeneration   observedGeneration reflects the generation of the most recently observed ReplicaSet
     * @param int|null                             $readyReplicas        readyReplicas is the number of pods targeted by this ReplicaSet with a Ready Condition
     */
    public function __construct(
        public int $replicas,
        public ?int $availableReplicas = null,
        public ?array $conditions = null,
        public ?int $fullyLabeledReplicas = null,
        public ?int $observedGeneration = null,
        public ?int $readyReplicas = null,
    ) {
    }
}
