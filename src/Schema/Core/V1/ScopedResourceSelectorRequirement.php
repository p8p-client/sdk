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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ScopedResourceSelectorRequirement')]
class ScopedResourceSelectorRequirement
{
    /**
     * @param string $operator Represents a scope's relationship to a set of values. Valid operators are In, NotIn, Exists, DoesNotExist.
     *
     * Possible enum values:
     *  - `"DoesNotExist"`
     *  - `"Exists"`
     *  - `"In"`
     *  - `"NotIn"`
     * @param string $scopeName The name of the scope that the selector applies to.
     *
     * Possible enum values:
     *  - `"BestEffort"` Match all pod objects that have best effort quality of service
     *  - `"CrossNamespacePodAffinity"` Match all pod objects that have cross-namespace pod (anti)affinity mentioned.
     *  - `"NotBestEffort"` Match all pod objects that do not have best effort quality of service
     *  - `"NotTerminating"` Match all pod objects where spec.activeDeadlineSeconds is nil
     *  - `"PriorityClass"` Match all pod objects that have priority class mentioned
     *  - `"Terminating"` Match all pod objects where spec.activeDeadlineSeconds >=0
     *  - `"VolumeAttributesClass"` Match all pvc objects that have volume attributes class mentioned.
     * @param array<int, string>|null $values An array of string values. If the operator is In or NotIn, the values array must be non-empty. If the operator is Exists or DoesNotExist, the values array must be empty. This array is replaced during a strategic merge patch.
     */
    public function __construct(
        public string $operator,
        public string $scopeName,
        public ?array $values = null,
    ) {
    }
}
