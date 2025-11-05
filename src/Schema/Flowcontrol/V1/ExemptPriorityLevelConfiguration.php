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

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.ExemptPriorityLevelConfiguration')]
class ExemptPriorityLevelConfiguration
{
    /**
     * @param int|null $lendablePercent `lendablePercent` prescribes the fraction of the level's NominalCL that can be borrowed by other priority levels.  This value of this field must be between 0 and 100, inclusive, and it defaults to 0. The number of seats that other levels can borrow from this level, known as this level's LendableConcurrencyLimit (LendableCL), is defined as follows.
     *
     * LendableCL(i) = round( NominalCL(i) * lendablePercent(i)/100.0 )
     * @param int|null $nominalConcurrencyShares `nominalConcurrencyShares` (NCS) contributes to the computation of the NominalConcurrencyLimit (NominalCL) of this level. This is the number of execution seats nominally reserved for this priority level. This DOES NOT limit the dispatching from this priority level but affects the other priority levels through the borrowing mechanism. The server's concurrency limit (ServerCL) is divided among all the priority levels in proportion to their NCS values:
     *
     * NominalCL(i)  = ceil( ServerCL * NCS(i) / sum_ncs ) sum_ncs = sum[priority level k] NCS(k)
     *
     * Bigger numbers mean a larger nominal concurrency limit, at the expense of every other priority level. This field has a default value of zero.
     */
    public function __construct(
        public ?int $lendablePercent = null,
        public ?int $nominalConcurrencyShares = null,
    ) {
    }
}
