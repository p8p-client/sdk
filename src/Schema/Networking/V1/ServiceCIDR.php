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
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.networking.v1.ServiceCIDR')]
#[K8sSchema(kind: 'ServiceCIDR', group: 'networking.k8s.io', version: 'v1')]
class ServiceCIDR
{
    /**
     * @param ObjectMeta|null        $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param ServiceCIDRSpec|null   $spec     spec is the desired state of the ServiceCIDR. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     * @param ServiceCIDRStatus|null $status   status represents the current state of the ServiceCIDR. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?ServiceCIDRSpec $spec = null,
        public ?ServiceCIDRStatus $status = null,
    ) {
    }
}
