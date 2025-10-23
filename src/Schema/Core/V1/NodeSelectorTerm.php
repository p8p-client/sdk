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

class NodeSelectorTerm
{
    /**
     * @param array<int, NodeSelectorRequirement>|null $matchExpressions a list of node selector requirements by node's labels
     * @param array<int, NodeSelectorRequirement>|null $matchFields      a list of node selector requirements by node's fields
     */
    public function __construct(
        public ?array $matchExpressions = null,
        public ?array $matchFields = null,
    ) {
    }
}
