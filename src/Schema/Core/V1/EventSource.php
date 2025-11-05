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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.EventSource')]
class EventSource
{
    /**
     * @param string|null $component component from which the event is generated
     * @param string|null $host      node name on which the event is generated
     */
    public function __construct(
        public ?string $component = null,
        public ?string $host = null,
    ) {
    }
}
