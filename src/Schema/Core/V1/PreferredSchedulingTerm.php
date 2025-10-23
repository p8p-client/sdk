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

class PreferredSchedulingTerm
{
    /**
     * @param NodeSelectorTerm $preference a node selector term, associated with the corresponding weight
     * @param int              $weight     weight associated with matching the corresponding nodeSelectorTerm, in the range 1-100
     */
    public function __construct(
        public NodeSelectorTerm $preference,
        public int $weight,
    ) {
    }
}
