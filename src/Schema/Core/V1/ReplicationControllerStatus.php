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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ReplicationControllerStatus')]
class ReplicationControllerStatus
{
    /**
     * @param int                                             $replicas             Replicas is the most recently observed number of replicas. More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#what-is-a-replicationcontroller
     * @param int|null                                        $availableReplicas    the number of available replicas (ready for at least minReadySeconds) for this replication controller
     * @param array<int, ReplicationControllerCondition>|null $conditions           represents the latest available observations of a replication controller's current state
     * @param int|null                                        $fullyLabeledReplicas the number of pods that have labels matching the labels of the pod template of the replication controller
     * @param int|null                                        $observedGeneration   observedGeneration reflects the generation of the most recently observed replication controller
     * @param int|null                                        $readyReplicas        the number of ready replicas for this replication controller
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
