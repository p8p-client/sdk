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

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.TokenRequestStatus')]
class TokenRequestStatus
{
    /**
     * @param \DateTime $expirationTimestamp expirationTimestamp is the time of expiration of the returned token
     * @param string    $token               token is the opaque bearer token
     */
    public function __construct(
        public \DateTime $expirationTimestamp,
        public string $token,
    ) {
    }
}
