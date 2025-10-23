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

namespace P8p\Sdk\Schema\Flowcontrol\V1;

class Subject
{
    /**
     * @param string                     $kind           `kind` indicates which one of the other fields is non-empty. Required
     * @param groupSubject|null          $group          `group` matches based on user group name
     * @param serviceAccountSubject|null $serviceAccount `serviceAccount` matches ServiceAccounts
     * @param userSubject|null           $user           `user` matches based on username
     */
    public function __construct(
        public string $kind,
        public ?GroupSubject $group = null,
        public ?ServiceAccountSubject $serviceAccount = null,
        public ?UserSubject $user = null,
    ) {
    }
}
