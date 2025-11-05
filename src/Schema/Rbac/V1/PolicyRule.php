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

namespace P8p\Sdk\Schema\Rbac\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.PolicyRule')]
class PolicyRule
{
    /**
     * @param array<int, string>      $verbs           Verbs is a list of Verbs that apply to ALL the ResourceKinds contained in this rule. '*' represents all verbs.
     * @param array<int, string>|null $apiGroups       APIGroups is the name of the APIGroup that contains the resources.  If multiple API groups are specified, any action requested against one of the enumerated resources in any API group will be allowed. "" represents the core API group and "*" represents all API groups.
     * @param array<int, string>|null $nonResourceURLs NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but only as the full, final step in the path Since non-resource URLs are not namespaced, this field is only applicable for ClusterRoles referenced from a ClusterRoleBinding. Rules can either apply to API resources (such as "pods" or "secrets") or non-resource URL paths (such as "/api"),  but not both.
     * @param array<int, string>|null $resourceNames   ResourceNames is an optional white list of names that the rule applies to.  An empty set means that everything is allowed.
     * @param array<int, string>|null $resources       Resources is a list of resources this rule applies to. '*' represents all resources.
     */
    public function __construct(
        public array $verbs,
        public ?array $apiGroups = null,
        public ?array $nonResourceURLs = null,
        public ?array $resourceNames = null,
        public ?array $resources = null,
    ) {
    }
}
