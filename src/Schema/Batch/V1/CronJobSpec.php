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

class CronJobSpec
{
    /**
     * @param JobTemplateSpec $jobTemplate       specifies the job that will be created when executing a CronJob
     * @param string          $schedule          The schedule in Cron format, see https://en.wikipedia.org/wiki/Cron.
     * @param string|null     $concurrencyPolicy Specifies how to treat concurrent executions of a Job. Valid values are:
     *
     * - "Allow" (default): allows CronJobs to run concurrently; - "Forbid": forbids concurrent runs, skipping next run if previous run hasn't finished yet; - "Replace": cancels currently running job and replaces it with a new one
     *
     * Possible enum values:
     *  - `"Allow"` allows CronJobs to run concurrently.
     *  - `"Forbid"` forbids concurrent runs, skipping next run if previous hasn't finished yet.
     *  - `"Replace"` cancels currently running job and replaces it with a new one.
     * @param int|null    $failedJobsHistoryLimit     The number of failed finished jobs to retain. Value must be non-negative integer. Defaults to 1.
     * @param int|null    $startingDeadlineSeconds    Optional deadline in seconds for starting the job if it misses scheduled time for any reason.  Missed jobs executions will be counted as failed ones.
     * @param int|null    $successfulJobsHistoryLimit The number of successful finished jobs to retain. Value must be non-negative integer. Defaults to 3.
     * @param bool|null   $suspend                    This flag tells the controller to suspend subsequent executions, it does not apply to already started executions.  Defaults to false.
     * @param string|null $timeZone                   The time zone name for the given schedule, see https://en.wikipedia.org/wiki/List_of_tz_database_time_zones. If not specified, this will default to the time zone of the kube-controller-manager process. The set of valid time zone names and the time zone offset is loaded from the system-wide time zone database by the API server during CronJob validation and the controller manager during execution. If no system-wide time zone database can be found a bundled version of the database is used instead. If the time zone name becomes invalid during the lifetime of a CronJob or due to a change in host configuration, the controller will stop creating new new Jobs and will create a system event with the reason UnknownTimeZone. More information can be found in https://kubernetes.io/docs/concepts/workloads/controllers/cron-jobs/#time-zones
     */
    public function __construct(
        public JobTemplateSpec $jobTemplate,
        public string $schedule,
        public ?string $concurrencyPolicy = null,
        public ?int $failedJobsHistoryLimit = null,
        public ?int $startingDeadlineSeconds = null,
        public ?int $successfulJobsHistoryLimit = null,
        public ?bool $suspend = null,
        public ?string $timeZone = null,
    ) {
    }
}
