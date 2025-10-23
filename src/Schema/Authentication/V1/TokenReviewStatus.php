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

class TokenReviewStatus
{
    /**
     * @param array<int, string>|null $audiences     Audiences are audience identifiers chosen by the authenticator that are compatible with both the TokenReview and token. An identifier is any identifier in the intersection of the TokenReviewSpec audiences and the token's audiences. A client of the TokenReview API that sets the spec.audiences field should validate that a compatible audience identifier is returned in the status.audiences field to ensure that the TokenReview server is audience aware. If a TokenReview returns an empty status.audience field where status.authenticated is "true", the token is valid against the audience of the Kubernetes API server.
     * @param bool|null               $authenticated authenticated indicates that the token was associated with a known user
     * @param string|null             $error         Error indicates that the token couldn't be checked
     * @param UserInfo|null           $user          user is the UserInfo associated with the provided token
     */
    public function __construct(
        public ?array $audiences = null,
        public ?bool $authenticated = null,
        public ?string $error = null,
        public ?UserInfo $user = null,
    ) {
    }
}
