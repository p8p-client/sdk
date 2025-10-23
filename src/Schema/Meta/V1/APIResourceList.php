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

namespace P8p\Sdk\Schema\Meta\V1;

use P8p\Client\Attribute\K8sSchema;

#[K8sSchema(kind: 'APIResourceList', apiVersion: 'v1')]
class APIResourceList
{
    /**
     * @param string                  $groupVersion groupVersion is the group and version this APIResourceList is for
     * @param array<int, APIResource> $resources    resources contains the name of the resources and if they are namespaced
     */
    public function __construct(
        public string $groupVersion,
        public array $resources,
    ) {
    }
}
