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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.WatchEvent')]
class WatchEvent
{
    /**
     * @param array<mixed>|object $object Object is:
     *                                    * If Type is Added or Modified: the new state of the object.
     *                                    * If Type is Deleted: the state of the object immediately before deletion.
     *                                    * If Type is Error: *Status is recommended; other types may make sense
     *                                    depending on context.
     */
    public function __construct(
        public array|object $object,
        public string $type,
    ) {
    }
}
