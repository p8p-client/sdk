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

namespace P8p\Sdk\Schema\Rbac\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.ClusterRole')]
#[K8sSchema(kind: 'ClusterRole', group: 'rbac.authorization.k8s.io', version: 'v1')]
class ClusterRole
{
    /**
     * @param AggregationRule|null        $aggregationRule AggregationRule is an optional field that describes how to build the Rules for this ClusterRole. If AggregationRule is set, then the Rules are controller managed and direct changes to Rules will be stomped by the controller.
     * @param ObjectMeta|null             $metadata        standard object's metadata
     * @param array<int, PolicyRule>|null $rules           Rules holds all the PolicyRules for this ClusterRole
     */
    public function __construct(
        public ?AggregationRule $aggregationRule = null,
        public ?ObjectMeta $metadata = null,
        public ?array $rules = null,
    ) {
    }
}
