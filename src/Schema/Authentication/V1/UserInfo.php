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

namespace P8p\Sdk\Schema\Authentication\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.UserInfo')]
class UserInfo
{
    /**
     * @param array<mixed>|null       $extra    any additional information provided by the authenticator
     * @param array<int, string>|null $groups   the names of groups this user is a part of
     * @param string|null             $uid      A unique value that identifies this user across time. If this user is deleted and another user by the same name is added, they will have different UIDs.
     * @param string|null             $username the name that uniquely identifies this user among all active users
     */
    public function __construct(
        public ?array $extra = null,
        public ?array $groups = null,
        public ?string $uid = null,
        public ?string $username = null,
    ) {
    }
}
