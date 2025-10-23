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

namespace P8p\Sdk\Schema\Coordination\V1;

class LeaseSpec
{
    /**
     * @param \DateTime|null $acquireTime          acquireTime is a time when the current lease was acquired
     * @param string|null    $holderIdentity       holderIdentity contains the identity of the holder of a current lease. If Coordinated Leader Election is used, the holder identity must be equal to the elected LeaseCandidate.metadata.name field.
     * @param int|null       $leaseDurationSeconds leaseDurationSeconds is a duration that candidates for a lease need to wait to force acquire it. This is measured against the time of last observed renewTime.
     * @param int|null       $leaseTransitions     leaseTransitions is the number of transitions of a lease between holders
     * @param string|null    $preferredHolder      PreferredHolder signals to a lease holder that the lease has a more optimal holder and should be given up. This field can only be set if Strategy is also set.
     * @param \DateTime|null $renewTime            renewTime is a time when the current holder of a lease has last updated the lease
     * @param string|null    $strategy             Strategy indicates the strategy for picking the leader for coordinated leader election. If the field is not specified, there is no active coordination for this lease. (Alpha) Using this field requires the CoordinatedLeaderElection feature gate to be enabled.
     */
    public function __construct(
        public ?\DateTime $acquireTime = null,
        public ?string $holderIdentity = null,
        public ?int $leaseDurationSeconds = null,
        public ?int $leaseTransitions = null,
        public ?string $preferredHolder = null,
        public ?\DateTime $renewTime = null,
        public ?string $strategy = null,
    ) {
    }
}
