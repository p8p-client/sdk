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

namespace P8p\Sdk\Schema\Batch\V1;

class PodFailurePolicyRule
{
    /**
     * @param string $action Specifies the action taken on a pod failure when the requirements are satisfied. Possible values are:
     *
     * - FailJob: indicates that the pod's job is marked as Failed and all
     *   running pods are terminated.
     * - FailIndex: indicates that the pod's index is marked as Failed and will
     *   not be restarted.
     *   This value is beta-level. It can be used when the
     *   `JobBackoffLimitPerIndex` feature gate is enabled (enabled by default).
     * - Ignore: indicates that the counter towards the .backoffLimit is not
     *   incremented and a replacement pod is created.
     * - Count: indicates that the pod is handled in the default way - the
     *   counter towards the .backoffLimit is incremented.
     * Additional values are considered to be added in the future. Clients should react to an unknown action by skipping the rule.
     *
     * Possible enum values:
     *  - `"Count"` This is an action which might be taken on a pod failure - the pod failure is handled in the default way - the counter towards .backoffLimit, represented by the job's .status.failed field, is incremented.
     *  - `"FailIndex"` This is an action which might be taken on a pod failure - mark the Job's index as failed to avoid restarts within this index. This action can only be used when backoffLimitPerIndex is set. This value is beta-level.
     *  - `"FailJob"` This is an action which might be taken on a pod failure - mark the pod's job as Failed and terminate all running pods.
     *  - `"Ignore"` This is an action which might be taken on a pod failure - the counter towards .backoffLimit, represented by the job's .status.failed field, is not incremented and a replacement pod is created.
     * @param PodFailurePolicyOnExitCodesRequirement|null             $onExitCodes     represents the requirement on the container exit codes
     * @param array<int, PodFailurePolicyOnPodConditionsPattern>|null $onPodConditions Represents the requirement on the pod conditions. The requirement is represented as a list of pod condition patterns. The requirement is satisfied if at least one pattern matches an actual pod condition. At most 20 elements are allowed.
     */
    public function __construct(
        public string $action,
        public ?PodFailurePolicyOnExitCodesRequirement $onExitCodes = null,
        public ?array $onPodConditions = null,
    ) {
    }
}
