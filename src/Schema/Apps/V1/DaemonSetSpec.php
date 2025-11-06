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

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.DaemonSetSpec')]
class DaemonSetSpec
{
    /**
     * @param LabelSelector                $selector             A label query over pods that are managed by the daemon set. Must match in order to be controlled. It must match the pod template's labels. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     * @param PodTemplateSpec              $template             An object that describes the pod that will be created. The DaemonSet will create exactly one copy of this pod on every node that matches the template's node selector (or on every node if no node selector is specified). The only allowed template.spec.restartPolicy value is "Always". More info: https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     * @param int|null                     $minReadySeconds      The minimum number of seconds for which a newly created DaemonSet pod should be ready without any of its container crashing, for it to be considered available. Defaults to 0 (pod will be considered available as soon as it is ready).
     * @param int|null                     $revisionHistoryLimit The number of old history to retain to allow rollback. This is a pointer to distinguish between explicit zero and not specified. Defaults to 10.
     * @param DaemonSetUpdateStrategy|null $updateStrategy       an update strategy to replace existing DaemonSet pods with new pods
     */
    public function __construct(
        public LabelSelector $selector,
        public PodTemplateSpec $template,
        public ?int $minReadySeconds = null,
        public ?int $revisionHistoryLimit = null,
        public ?DaemonSetUpdateStrategy $updateStrategy = null,
    ) {
    }
}
