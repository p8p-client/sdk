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

#[K8sSchemaRef(name: 'io.k8s.api.authentication.v1.BoundObjectReference')]
class BoundObjectReference
{
    /**
     * @param string|null $apiVersion API version of the referent
     * @param string|null $kind       Kind of the referent. Valid kinds are 'Pod' and 'Secret'.
     * @param string|null $name       name of the referent
     * @param string|null $uid        UID of the referent
     */
    public function __construct(
        public ?string $apiVersion = null,
        public ?string $kind = null,
        public ?string $name = null,
        public ?string $uid = null,
    ) {
    }
}
