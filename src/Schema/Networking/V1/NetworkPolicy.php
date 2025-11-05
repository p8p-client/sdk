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

namespace P8p\Sdk\Schema\Networking\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.NetworkPolicy')]
#[K8sSchema(kind: 'NetworkPolicy', group: 'networking.k8s.io', version: 'v1')]
class NetworkPolicy
{
    /**
     * @param ObjectMeta|null        $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param NetworkPolicySpec|null $spec     spec represents the specification of the desired behavior for this NetworkPolicy
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?NetworkPolicySpec $spec = null,
    ) {
    }
}
