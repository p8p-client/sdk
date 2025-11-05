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

namespace P8p\Sdk\Schema\Core\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.EventSeries')]
class EventSeries
{
    /**
     * @param int|null       $count            Number of occurrences in this series up to the last heartbeat time
     * @param \DateTime|null $lastObservedTime Time of the last occurrence observed
     */
    public function __construct(
        public ?int $count = null,
        public ?\DateTime $lastObservedTime = null,
    ) {
    }
}
