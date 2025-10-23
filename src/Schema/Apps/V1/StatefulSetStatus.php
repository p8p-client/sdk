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

class StatefulSetStatus
{
    /**
     * @param int                                   $replicas           replicas is the number of Pods created by the StatefulSet controller
     * @param int|null                              $availableReplicas  total number of available pods (ready for at least minReadySeconds) targeted by this statefulset
     * @param int|null                              $collisionCount     collisionCount is the count of hash collisions for the StatefulSet. The StatefulSet controller uses this field as a collision avoidance mechanism when it needs to create the name for the newest ControllerRevision.
     * @param array<int, StatefulSetCondition>|null $conditions         represents the latest available observations of a statefulset's current state
     * @param int|null                              $currentReplicas    currentReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet version indicated by currentRevision
     * @param string|null                           $currentRevision    currentRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the sequence [0,currentReplicas)
     * @param int|null                              $observedGeneration observedGeneration is the most recent generation observed for this StatefulSet. It corresponds to the StatefulSet's generation, which is updated on mutation by the API Server.
     * @param int|null                              $readyReplicas      readyReplicas is the number of pods created for this StatefulSet with a Ready Condition
     * @param string|null                           $updateRevision     updateRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the sequence [replicas-updatedReplicas,replicas)
     * @param int|null                              $updatedReplicas    updatedReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet version indicated by updateRevision
     */
    public function __construct(
        public int $replicas,
        public ?int $availableReplicas = null,
        public ?int $collisionCount = null,
        public ?array $conditions = null,
        public ?int $currentReplicas = null,
        public ?string $currentRevision = null,
        public ?int $observedGeneration = null,
        public ?int $readyReplicas = null,
        public ?string $updateRevision = null,
        public ?int $updatedReplicas = null,
    ) {
    }
}
