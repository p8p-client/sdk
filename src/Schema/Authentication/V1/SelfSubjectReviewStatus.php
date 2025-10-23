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

class SelfSubjectReviewStatus
{
    /**
     * @param UserInfo|null $userInfo user attributes of the user making this request
     */
    public function __construct(
        public ?UserInfo $userInfo = null,
    ) {
    }
}
