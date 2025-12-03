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
use P8p\Sdk\Schema\Core\V1\PersistentVolumeClaim;
use P8p\Sdk\Schema\Core\V1\PodTemplateSpec;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.StatefulSetSpec')]
class StatefulSetSpec
{
    /**
     * @param LabelSelector                                        $selector                             selector is a label query over pods that should match the replica count. It must match the pod template's labels. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     * @param PodTemplateSpec                                      $template                             template is the object that describes the pod that will be created if insufficient replicas are detected. Each pod stamped out by the StatefulSet will fulfill this Template, but have a unique identity from the rest of the StatefulSet. Each pod will be named with the format <statefulsetname>-<podindex>. For example, a pod in a StatefulSet named "web" with index number "3" would be named "web-3". The only allowed template.spec.restartPolicy value is "Always".
     * @param int|null                                             $minReadySeconds                      Minimum number of seconds for which a newly created pod should be ready without any of its container crashing for it to be considered available. Defaults to 0 (pod will be considered available as soon as it is ready)
     * @param StatefulSetOrdinals|null                             $ordinals                             ordinals controls the numbering of replica indices in a StatefulSet. The default ordinals behavior assigns a "0" index to the first replica and increments the index by one for each additional replica requested.
     * @param StatefulSetPersistentVolumeClaimRetentionPolicy|null $persistentVolumeClaimRetentionPolicy persistentVolumeClaimRetentionPolicy describes the lifecycle of persistent volume claims created from volumeClaimTemplates. By default, all persistent volume claims are created as needed and retained until manually deleted. This policy allows the lifecycle to be altered, for example by deleting persistent volume claims when their stateful set is deleted, or when their pod is scaled down.
     * @param string|null                                          $podManagementPolicy                  podManagementPolicy controls how pods are created during initial scale up, when replacing pods on nodes, or when scaling down. The default policy is `OrderedReady`, where pods are created in increasing order (pod-0, then pod-1, etc) and the controller will wait until each pod is ready before continuing. When scaling down, the pods are removed in the opposite order. The alternative policy is `Parallel` which will create pods in parallel to match the desired scale without waiting, and on scale down will delete all pods at once.
     *
     * Possible enum values:
     *  - `"OrderedReady"` will create pods in strictly increasing order on scale up and strictly decreasing order on scale down, progressing only when the previous pod is ready or terminated. At most one pod will be changed at any time.
     *  - `"Parallel"` will create and delete pods as soon as the stateful set replica count is changed, and will not wait for pods to be ready or complete termination.
     * @param int|null                               $replicas             replicas is the desired number of replicas of the given Template. These are replicas in the sense that they are instantiations of the same Template, but individual replicas also have a consistent identity. If unspecified, defaults to 1.
     * @param int|null                               $revisionHistoryLimit revisionHistoryLimit is the maximum number of revisions that will be maintained in the StatefulSet's revision history. The revision history consists of all revisions not represented by a currently applied StatefulSetSpec version. The default value is 10.
     * @param string|null                            $serviceName          serviceName is the name of the service that governs this StatefulSet. This service must exist before the StatefulSet, and is responsible for the network identity of the set. Pods get DNS/hostnames that follow the pattern: pod-specific-string.serviceName.default.svc.cluster.local where "pod-specific-string" is managed by the StatefulSet controller.
     * @param StatefulSetUpdateStrategy|null         $updateStrategy       updateStrategy indicates the StatefulSetUpdateStrategy that will be employed to update Pods in the StatefulSet when a revision is made to Template
     * @param array<int, PersistentVolumeClaim>|null $volumeClaimTemplates volumeClaimTemplates is a list of claims that pods are allowed to reference. The StatefulSet controller is responsible for mapping network identities to claims in a way that maintains the identity of a pod. Every claim in this list must have at least one matching (by name) volumeMount in one container in the template. A claim in this list takes precedence over any volumes in the template, with the same name.
     */
    public function __construct(
        public LabelSelector $selector,
        public PodTemplateSpec $template,
        public ?int $minReadySeconds = null,
        public ?StatefulSetOrdinals $ordinals = null,
        public ?StatefulSetPersistentVolumeClaimRetentionPolicy $persistentVolumeClaimRetentionPolicy = null,
        public ?string $podManagementPolicy = null,
        public ?int $replicas = null,
        public ?int $revisionHistoryLimit = null,
        public ?string $serviceName = null,
        public ?StatefulSetUpdateStrategy $updateStrategy = null,
        public ?array $volumeClaimTemplates = null,
    ) {
    }
}
