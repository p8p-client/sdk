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

class SelfSubjectAccessReviewSpec
{
    /**
     * @param NonResourceAttributes|null $nonResourceAttributes NonResourceAttributes describes information for a non-resource access request
     * @param ResourceAttributes|null    $resourceAttributes    ResourceAuthorizationAttributes describes information for a resource access request
     */
    public function __construct(
        public ?NonResourceAttributes $nonResourceAttributes = null,
        public ?ResourceAttributes $resourceAttributes = null,
    ) {
    }
}
