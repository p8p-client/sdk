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
use P8p\Sdk\Schema\Core\V1\LabelSelector;
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.DeploymentSpec')]
class DeploymentSpec
{
    /**
     * @param LabelSelector           $selector                Label selector for pods. Existing ReplicaSets whose pods are selected by this will be the ones affected by this deployment. It must match the pod template's labels.
     * @param PodTemplateSpec         $template                Template describes the pods that will be created. The only allowed template.spec.restartPolicy value is "Always".
     * @param int|null                $minReadySeconds         Minimum number of seconds for which a newly created pod should be ready without any of its container crashing, for it to be considered available. Defaults to 0 (pod will be considered available as soon as it is ready)
     * @param bool|null               $paused                  indicates that the deployment is paused
     * @param int|null                $progressDeadlineSeconds The maximum time in seconds for a deployment to make progress before it is considered to be failed. The deployment controller will continue to process failed deployments and a condition with a ProgressDeadlineExceeded reason will be surfaced in the deployment status. Note that progress will not be estimated during the time a deployment is paused. Defaults to 600s.
     * @param int|null                $replicas                Number of desired pods. This is a pointer to distinguish between explicit zero and not specified. Defaults to 1.
     * @param int|null                $revisionHistoryLimit    The number of old ReplicaSets to retain to allow rollback. This is a pointer to distinguish between explicit zero and not specified. Defaults to 10.
     * @param DeploymentStrategy|null $strategy                the deployment strategy to use to replace existing pods with new ones
     */
    public function __construct(
        public LabelSelector $selector,
        public PodTemplateSpec $template,
        public ?int $minReadySeconds = null,
        public ?bool $paused = null,
        public ?int $progressDeadlineSeconds = null,
        public ?int $replicas = null,
        public ?int $revisionHistoryLimit = null,
        public ?DeploymentStrategy $strategy = null,
    ) {
    }
}
