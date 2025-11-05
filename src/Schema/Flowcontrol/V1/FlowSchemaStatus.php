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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.flowcontrol.v1.FlowSchemaStatus')]
class FlowSchemaStatus
{
    /**
     * @param array<int, FlowSchemaCondition>|null $conditions `conditions` is a list of the current states of FlowSchema
     */
    public function __construct(
        public ?array $conditions = null,
    ) {
    }
}
