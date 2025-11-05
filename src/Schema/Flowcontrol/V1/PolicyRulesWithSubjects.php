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

namespace P8p\Sdk\Schema\Flowcontrol\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.PolicyRulesWithSubjects')]
class PolicyRulesWithSubjects
{
    /**
     * @param array<int, Subject>                    $subjects         subjects is the list of normal user, serviceaccount, or group that this rule cares about. There must be at least one member in this slice. A slice that includes both the system:authenticated and system:unauthenticated user groups matches every request. Required.
     * @param array<int, NonResourcePolicyRule>|null $nonResourceRules `nonResourceRules` is a list of NonResourcePolicyRules that identify matching requests according to their verb and the target non-resource URL
     * @param array<int, ResourcePolicyRule>|null    $resourceRules    `resourceRules` is a slice of ResourcePolicyRules that identify matching requests according to their verb and the target resource. At least one of `resourceRules` and `nonResourceRules` has to be non-empty.
     */
    public function __construct(
        public array $subjects,
        public ?array $nonResourceRules = null,
        public ?array $resourceRules = null,
    ) {
    }
}
