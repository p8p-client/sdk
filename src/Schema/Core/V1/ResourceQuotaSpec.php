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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ResourceQuotaSpec')]
class ResourceQuotaSpec
{
    /**
     * @param array<mixed>|null       $hard          hard is the set of desired hard limits for each named resource. More info: https://kubernetes.io/docs/concepts/policy/resource-quotas/
     * @param ScopeSelector|null      $scopeSelector scopeSelector is also a collection of filters like scopes that must match each object tracked by a quota but expressed using ScopeSelectorOperator in combination with possible values. For a resource to match, both scopes AND scopeSelector (if specified in spec), must be matched.
     * @param array<int, string>|null $scopes        A collection of filters that must match each object tracked by a quota. If not specified, the quota matches all objects.
     */
    public function __construct(
        public ?array $hard = null,
        public ?ScopeSelector $scopeSelector = null,
        public ?array $scopes = null,
    ) {
    }
}
