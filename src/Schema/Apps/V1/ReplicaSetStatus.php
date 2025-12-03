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

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.ReplicaSetStatus')]
class ReplicaSetStatus
{
    /**
     * @param int                                  $replicas             Replicas is the most recently observed number of non-terminating pods. More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicaset
     * @param int|null                             $availableReplicas    the number of available non-terminating pods (ready for at least minReadySeconds) for this replica set
     * @param array<int, ReplicaSetCondition>|null $conditions           represents the latest available observations of a replica set's current state
     * @param int|null                             $fullyLabeledReplicas the number of non-terminating pods that have labels matching the labels of the pod template of the replicaset
     * @param int|null                             $observedGeneration   observedGeneration reflects the generation of the most recently observed ReplicaSet
     * @param int|null                             $readyReplicas        the number of non-terminating pods targeted by this ReplicaSet with a Ready Condition
     * @param int|null                             $terminatingReplicas  The number of terminating pods for this replica set. Terminating pods have a non-null .metadata.deletionTimestamp and have not yet reached the Failed or Succeeded .status.phase.
     *
     * This is an alpha field. Enable DeploymentReplicaSetTerminatingReplicas to be able to use this field.
     */
    public function __construct(
        public int $replicas,
        public ?int $availableReplicas = null,
        public ?array $conditions = null,
        public ?int $fullyLabeledReplicas = null,
        public ?int $observedGeneration = null,
        public ?int $readyReplicas = null,
        public ?int $terminatingReplicas = null,
    ) {
    }
}
