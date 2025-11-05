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
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;
use P8p\Sdk\Schema\Meta\V1\LabelSelector;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.ReplicaSetSpec')]
class ReplicaSetSpec
{
    /**
     * @param LabelSelector        $selector        Selector is a label query over pods that should match the replica count. Label keys and values that must match in order to be controlled by this replica set. It must match the pod template's labels. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     * @param int|null             $minReadySeconds Minimum number of seconds for which a newly created pod should be ready without any of its container crashing, for it to be considered available. Defaults to 0 (pod will be considered available as soon as it is ready)
     * @param int|null             $replicas        Replicas is the number of desired replicas. This is a pointer to distinguish between explicit zero and unspecified. Defaults to 1. More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller/#what-is-a-replicationcontroller
     * @param PodTemplateSpec|null $template        Template is the object that describes the pod that will be created if insufficient replicas are detected. More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     */
    public function __construct(
        public LabelSelector $selector,
        public ?int $minReadySeconds = null,
        public ?int $replicas = null,
        public ?PodTemplateSpec $template = null,
    ) {
    }
}
