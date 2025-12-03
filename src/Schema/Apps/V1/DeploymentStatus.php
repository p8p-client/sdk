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

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.DeploymentStatus')]
class DeploymentStatus
{
    /**
     * @param int|null                             $availableReplicas   total number of available non-terminating pods (ready for at least minReadySeconds) targeted by this deployment
     * @param int|null                             $collisionCount      Count of hash collisions for the Deployment. The Deployment controller uses this field as a collision avoidance mechanism when it needs to create the name for the newest ReplicaSet.
     * @param array<int, DeploymentCondition>|null $conditions          represents the latest available observations of a deployment's current state
     * @param int|null                             $observedGeneration  the generation observed by the deployment controller
     * @param int|null                             $readyReplicas       total number of non-terminating pods targeted by this Deployment with a Ready Condition
     * @param int|null                             $replicas            total number of non-terminating pods targeted by this deployment (their labels match the selector)
     * @param int|null                             $terminatingReplicas Total number of terminating pods targeted by this deployment. Terminating pods have a non-null .metadata.deletionTimestamp and have not yet reached the Failed or Succeeded .status.phase.
     *
     * This is an alpha field. Enable DeploymentReplicaSetTerminatingReplicas to be able to use this field.
     * @param int|null $unavailableReplicas Total number of unavailable pods targeted by this deployment. This is the total number of pods that are still required for the deployment to have 100% available capacity. They may either be pods that are running but not yet available or pods that still have not been created.
     * @param int|null $updatedReplicas     total number of non-terminating pods targeted by this deployment that have the desired template spec
     */
    public function __construct(
        public ?int $availableReplicas = null,
        public ?int $collisionCount = null,
        public ?array $conditions = null,
        public ?int $observedGeneration = null,
        public ?int $readyReplicas = null,
        public ?int $replicas = null,
        public ?int $terminatingReplicas = null,
        public ?int $unavailableReplicas = null,
        public ?int $updatedReplicas = null,
    ) {
    }
}
