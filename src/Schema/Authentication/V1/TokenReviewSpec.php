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

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.TokenReviewSpec')]
class TokenReviewSpec
{
    /**
     * @param array<int, string>|null $audiences Audiences is a list of the identifiers that the resource server presented with the token identifies as. Audience-aware token authenticators will verify that the token was intended for at least one of the audiences in this list. If no audiences are provided, the audience will default to the audience of the Kubernetes apiserver.
     * @param string|null             $token     token is the opaque bearer token
     */
    public function __construct(
        public ?array $audiences = null,
        public ?string $token = null,
    ) {
    }
}
