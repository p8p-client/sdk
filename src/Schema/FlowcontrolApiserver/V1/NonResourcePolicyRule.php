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

namespace P8p\Sdk\Schema\FlowcontrolApiserver\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.NonResourcePolicyRule')]
class NonResourcePolicyRule
{
    /**
     * @param array<int, string> $nonResourceURLs `nonResourceURLs` is a set of url prefixes that a user should have access to and may not be empty. For example:
     *                                            - "/healthz" is legal
     *                                            - "/hea*" is illegal
     *                                            - "/hea" is legal but matches nothing
     *                                            - "/hea/*" also matches nothing
     *                                            - "/healthz/*" matches all per-component health checks.
     *                                            "*" matches all non-resource urls. if it is present, it must be the only entry. Required.
     * @param array<int, string> $verbs           `verbs` is a list of matching verbs and may not be empty. "*" matches all verbs. If it is present, it must be the only entry. Required.
     */
    public function __construct(
        public array $nonResourceURLs,
        public array $verbs,
    ) {
    }
}
