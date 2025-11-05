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

namespace P8p\Sdk\Schema\Authorization\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.authorization.v1.SubjectAccessReviewSpec')]
class SubjectAccessReviewSpec
{
    /**
     * @param array<mixed>|null          $extra                 Extra corresponds to the user.Info.GetExtra() method from the authenticator.  Since that is input to the authorizer it needs a reflection here.
     * @param array<int, string>|null    $groups                groups is the groups you're testing for
     * @param NonResourceAttributes|null $nonResourceAttributes NonResourceAttributes describes information for a non-resource access request
     * @param ResourceAttributes|null    $resourceAttributes    ResourceAuthorizationAttributes describes information for a resource access request
     * @param string|null                $uid                   UID information about the requesting user
     * @param string|null                $user                  User is the user you're testing for. If you specify "User" but not "Groups", then is it interpreted as "What if User were not a member of any groups
     */
    public function __construct(
        public ?array $extra = null,
        public ?array $groups = null,
        public ?NonResourceAttributes $nonResourceAttributes = null,
        public ?ResourceAttributes $resourceAttributes = null,
        public ?string $uid = null,
        public ?string $user = null,
    ) {
    }
}
