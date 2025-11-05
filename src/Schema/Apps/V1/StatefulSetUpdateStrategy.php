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

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.StatefulSetUpdateStrategy')]
class StatefulSetUpdateStrategy
{
    /**
     * @param RollingUpdateStatefulSetStrategy|null $rollingUpdate rollingUpdate is used to communicate parameters when Type is RollingUpdateStatefulSetStrategyType
     * @param string|null                           $type          Type indicates the type of the StatefulSetUpdateStrategy. Default is RollingUpdate.
     *
     * Possible enum values:
     *  - `"OnDelete"` triggers the legacy behavior. Version tracking and ordered rolling restarts are disabled. Pods are recreated from the StatefulSetSpec when they are manually deleted. When a scale operation is performed with this strategy,specification version indicated by the StatefulSet's currentRevision.
     *  - `"RollingUpdate"` indicates that update will be applied to all Pods in the StatefulSet with respect to the StatefulSet ordering constraints. When a scale operation is performed with this strategy, new Pods will be created from the specification version indicated by the StatefulSet's updateRevision.
     */
    public function __construct(
        public ?RollingUpdateStatefulSetStrategy $rollingUpdate = null,
        public ?string $type = null,
    ) {
    }
}
