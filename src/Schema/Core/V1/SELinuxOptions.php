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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.SELinuxOptions')]
class SELinuxOptions
{
    /**
     * @param string|null $level level is SELinux level label that applies to the container
     * @param string|null $role  role is a SELinux role label that applies to the container
     * @param string|null $type  type is a SELinux type label that applies to the container
     * @param string|null $user  user is a SELinux user label that applies to the container
     */
    public function __construct(
        public ?string $level = null,
        public ?string $role = null,
        public ?string $type = null,
        public ?string $user = null,
    ) {
    }
}
