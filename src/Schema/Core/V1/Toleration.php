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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.Toleration')]
class Toleration
{
    /**
     * @param string|null $effect Effect indicates the taint effect to match. Empty means match all taint effects. When specified, allowed values are NoSchedule, PreferNoSchedule and NoExecute.
     *
     * Possible enum values:
     *  - `"NoExecute"` Evict any already-running pods that do not tolerate the taint. Currently enforced by NodeController.
     *  - `"NoSchedule"` Do not allow new pods to schedule onto the node unless they tolerate the taint, but allow all pods submitted to Kubelet without going through the scheduler to start, and allow all already-running pods to continue running. Enforced by the scheduler.
     *  - `"PreferNoSchedule"` Like TaintEffectNoSchedule, but the scheduler tries not to schedule new pods onto the node, rather than prohibiting new pods from scheduling onto the node entirely. Enforced by the scheduler.
     * @param string|null $key      Key is the taint key that the toleration applies to. Empty means match all taint keys. If the key is empty, operator must be Exists; this combination means to match all values and all keys.
     * @param string|null $operator Operator represents a key's relationship to the value. Valid operators are Exists and Equal. Defaults to Equal. Exists is equivalent to wildcard for value, so that a pod can tolerate all taints of a particular category.
     *
     * Possible enum values:
     *  - `"Equal"`
     *  - `"Exists"`
     * @param int|null    $tolerationSeconds TolerationSeconds represents the period of time the toleration (which must be of effect NoExecute, otherwise this field is ignored) tolerates the taint. By default, it is not set, which means tolerate the taint forever (do not evict). Zero and negative values will be treated as 0 (evict immediately) by the system.
     * @param string|null $value             Value is the taint value the toleration matches to. If the operator is Exists, the value should be empty, otherwise just a regular string.
     */
    public function __construct(
        public ?string $effect = null,
        public ?string $key = null,
        public ?string $operator = null,
        public ?int $tolerationSeconds = null,
        public ?string $value = null,
    ) {
    }
}
