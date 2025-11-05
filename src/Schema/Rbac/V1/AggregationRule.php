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

use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\LabelSelector;

#[K8sSchemaRef(name: 'io.k8s.api.rbac.v1.AggregationRule')]
class AggregationRule
{
    /**
     * @param array<int, LabelSelector>|null $clusterRoleSelectors ClusterRoleSelectors holds a list of selectors which will be used to find ClusterRoles and create the rules. If any of the selectors match, then the ClusterRole's permissions will be added
     */
    public function __construct(
        public ?array $clusterRoleSelectors = null,
    ) {
    }
}
