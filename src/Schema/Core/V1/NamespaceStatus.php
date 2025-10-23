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

class NamespaceStatus
{
    /**
     * @param array<int, NamespaceCondition>|null $conditions represents the latest available observations of a namespace's current state
     * @param string|null                         $phase      Phase is the current lifecycle phase of the namespace. More info: https://kubernetes.io/docs/tasks/administer-cluster/namespaces/
     *
     * Possible enum values:
     *  - `"Active"` means the namespace is available for use in the system
     *  - `"Terminating"` means the namespace is undergoing graceful termination
     */
    public function __construct(
        public ?array $conditions = null,
        public ?string $phase = null,
    ) {
    }
}
