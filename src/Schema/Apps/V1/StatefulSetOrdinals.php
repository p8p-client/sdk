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

namespace P8p\Sdk\Schema\Apps\V1;

class StatefulSetOrdinals
{
    /**
     * @param int|null $start start is the number representing the first replica's index. It may be used to number replicas from an alternate index (eg: 1-indexed) over the default 0-indexed names, or to orchestrate progressive movement of replicas from one StatefulSet to another. If set, replica indices will be in the range:
     *                        [.spec.ordinals.start, .spec.ordinals.start + .spec.replicas).
     *                        If unset, defaults to 0. Replica indices will be in the range:
     *                        [0, .spec.replicas).
     */
    public function __construct(
        public ?int $start = null,
    ) {
    }
}
