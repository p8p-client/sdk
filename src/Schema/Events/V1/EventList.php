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

namespace P8p\Sdk\Schema\Events\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchema(kind: 'EventList', apiVersion: 'v1')]
class EventList
{
    /**
     * @param array<int, Event> $items    items is a list of schema objects
     * @param ListMeta|null     $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
