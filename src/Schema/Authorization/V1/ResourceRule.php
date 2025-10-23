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

namespace P8p\Sdk\Schema\Authorization\V1;

class ResourceRule
{
    /**
     * @param array<int, string>      $verbs         Verb is a list of kubernetes resource API verbs, like: get, list, watch, create, update, delete, proxy.  "*" means all.
     * @param array<int, string>|null $apiGroups     APIGroups is the name of the APIGroup that contains the resources.  If multiple API groups are specified, any action requested against one of the enumerated resources in any API group will be allowed.  "*" means all.
     * @param array<int, string>|null $resourceNames ResourceNames is an optional white list of names that the rule applies to.  An empty set means that everything is allowed.  "*" means all.
     * @param array<int, string>|null $resources     Resources is a list of resources this rule applies to.  "*" means all in the specified apiGroups.
     *                                               "* /foo" represents the subresource 'foo' for all resources in the specified apiGroups.
     */
    public function __construct(
        public array $verbs,
        public ?array $apiGroups = null,
        public ?array $resourceNames = null,
        public ?array $resources = null,
    ) {
    }
}
