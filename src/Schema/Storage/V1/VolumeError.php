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

namespace P8p\Sdk\Schema\Storage\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.VolumeError')]
class VolumeError
{
    /**
     * @param string|null    $message message represents the error encountered during Attach or Detach operation. This string may be logged, so it should not contain sensitive information.
     * @param \DateTime|null $time    time represents the time the error was encountered
     */
    public function __construct(
        public ?string $message = null,
        public ?\DateTime $time = null,
    ) {
    }
}
