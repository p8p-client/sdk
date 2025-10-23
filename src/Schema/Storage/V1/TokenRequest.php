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

namespace P8p\Sdk\Schema\Storage\V1;

class TokenRequest
{
    /**
     * @param string   $audience          audience is the intended audience of the token in "TokenRequestSpec". It will default to the audiences of kube apiserver.
     * @param int|null $expirationSeconds expirationSeconds is the duration of validity of the token in "TokenRequestSpec". It has the same default value of "ExpirationSeconds" in "TokenRequestSpec".
     */
    public function __construct(
        public string $audience,
        public ?int $expirationSeconds = null,
    ) {
    }
}
