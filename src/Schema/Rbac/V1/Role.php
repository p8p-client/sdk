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
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'Role', group: 'rbac.authorization.k8s.io', version: 'v1')]
class Role
{
    /**
     * @param ObjectMeta|null             $metadata standard object's metadata
     * @param array<int, PolicyRule>|null $rules    Rules holds all the PolicyRules for this Role
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?array $rules = null,
    ) {
    }
}
