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

namespace P8p\Sdk\Schema\Authorization\V1;

class SubjectRulesReviewStatus
{
    /**
     * @param bool                        $incomplete       Incomplete is true when the rules returned by this call are incomplete. This is most commonly encountered when an authorizer, such as an external authorizer, doesn't support rules evaluation.
     * @param array<int, NonResourceRule> $nonResourceRules NonResourceRules is the list of actions the subject is allowed to perform on non-resources. The list ordering isn't significant, may contain duplicates, and possibly be incomplete.
     * @param array<int, ResourceRule>    $resourceRules    ResourceRules is the list of actions the subject is allowed to perform on resources. The list ordering isn't significant, may contain duplicates, and possibly be incomplete.
     * @param string|null                 $evaluationError  EvaluationError can appear in combination with Rules. It indicates an error occurred during rule evaluation, such as an authorizer that doesn't support rule evaluation, and that ResourceRules and/or NonResourceRules may be incomplete.
     */
    public function __construct(
        public bool $incomplete,
        public array $nonResourceRules,
        public array $resourceRules,
        public ?string $evaluationError = null,
    ) {
    }
}
