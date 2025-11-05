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

namespace P8p\Sdk\Schema\Discovery\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.discovery.v1.EndpointSliceList')]
#[K8sSchema(kind: 'EndpointSliceList', group: 'discovery.k8s.io', version: 'v1')]
class EndpointSliceList
{
    /**
     * @param array<int, EndpointSlice> $items    items is the list of endpoint slices
     * @param ListMeta|null             $metadata standard list metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
