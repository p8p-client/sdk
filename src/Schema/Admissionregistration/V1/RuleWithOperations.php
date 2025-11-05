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

namespace P8p\Sdk\Schema\Admissionregistration\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.RuleWithOperations')]
class RuleWithOperations
{
    /**
     * @param array<int, string>|null $apiGroups   APIGroups is the API groups the resources belong to. '*' is all groups. If '*' is present, the length of the slice must be one. Required.
     * @param array<int, string>|null $apiVersions APIVersions is the API versions the resources belong to. '*' is all versions. If '*' is present, the length of the slice must be one. Required.
     * @param array<int, string>|null $operations  Operations is the operations the admission hook cares about - CREATE, UPDATE, DELETE, CONNECT or * for all of those operations and any future admission operations that are added. If '*' is present, the length of the slice must be one. Required.
     * @param array<int, string>|null $resources   Resources is a list of resources this rule applies to.
     *
     * For example: 'pods' means pods. 'pods/log' means the log subresource of pods. '*' means all resources, but not subresources. 'pods/*' means all subresources of pods. '* /scale' means all scale subresources. '* /*' means all resources and their subresources.
     *
     * If wildcard is present, the validation rule will ensure resources do not overlap with each other.
     *
     * Depending on the enclosing object, subresources might not be allowed. Required.
     * @param string|null $scope scope specifies the scope of this rule. Valid values are "Cluster", "Namespaced", and "*" "Cluster" means that only cluster-scoped resources will match this rule. Namespace API objects are cluster-scoped. "Namespaced" means that only namespaced resources will match this rule. "*" means that there are no scope restrictions. Subresources match the scope of their parent resource. Default is "*".
     */
    public function __construct(
        public ?array $apiGroups = null,
        public ?array $apiVersions = null,
        public ?array $operations = null,
        public ?array $resources = null,
        public ?string $scope = null,
    ) {
    }
}
