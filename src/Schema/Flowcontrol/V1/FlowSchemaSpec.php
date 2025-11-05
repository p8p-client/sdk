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

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.FlowSchemaSpec')]
class FlowSchemaSpec
{
    /**
     * @param PriorityLevelConfigurationReference      $priorityLevelConfiguration `priorityLevelConfiguration` should reference a PriorityLevelConfiguration in the cluster. If the reference cannot be resolved, the FlowSchema will be ignored and marked as invalid in its status. Required.
     * @param FlowDistinguisherMethod|null             $distinguisherMethod        `distinguisherMethod` defines how to compute the flow distinguisher for requests that match this schema. `nil` specifies that the distinguisher is disabled and thus will always be the empty string.
     * @param int|null                                 $matchingPrecedence         `matchingPrecedence` is used to choose among the FlowSchemas that match a given request. The chosen FlowSchema is among those with the numerically lowest (which we take to be logically highest) MatchingPrecedence.  Each MatchingPrecedence value must be ranged in [1,10000]. Note that if the precedence is not specified, it will be set to 1000 as default.
     * @param array<int, PolicyRulesWithSubjects>|null $rules                      `rules` describes which requests will match this flow schema. This FlowSchema matches a request if and only if at least one member of rules matches the request. if it is an empty slice, there will be no requests matching the FlowSchema.
     */
    public function __construct(
        public PriorityLevelConfigurationReference $priorityLevelConfiguration,
        public ?FlowDistinguisherMethod $distinguisherMethod = null,
        public ?int $matchingPrecedence = null,
        public ?array $rules = null,
    ) {
    }
}
