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

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.FlowSchemaList')]
#[K8sSchema(kind: 'FlowSchemaList', group: 'flowcontrol.apiserver.k8s.io', version: 'v1')]
class FlowSchemaList
{
    /**
     * @param array<int, FlowSchema> $items    `items` is a list of FlowSchemas
     * @param ListMeta|null          $metadata `metadata` is the standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
