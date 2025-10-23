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

namespace P8p\Sdk\Schema\Rbac\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchema(kind: 'ClusterRoleList', apiVersion: 'v1')]
class ClusterRoleList
{
    /**
     * @param array<int, ClusterRole> $items    Items is a list of ClusterRoles
     * @param ListMeta|null           $metadata standard object's metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
