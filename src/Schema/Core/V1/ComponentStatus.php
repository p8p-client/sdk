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

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'ComponentStatus', apiVersion: 'v1')]
class ComponentStatus
{
    /**
     * @param array<int, ComponentCondition>|null $conditions List of component conditions observed
     * @param ObjectMeta|null                     $metadata   Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public ?array $conditions = null,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
