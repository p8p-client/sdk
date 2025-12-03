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
     * @param int|null $errorCode errorCode is a numeric gRPC code representing the error encountered during Attach or Detach operations.
     *
     * This is an optional, alpha field that requires the MutableCSINodeAllocatableCount feature gate being enabled to be set.
     * @param string|null    $message message represents the error encountered during Attach or Detach operation. This string may be logged, so it should not contain sensitive information.
     * @param \DateTime|null $time    time represents the time the error was encountered
     */
    public function __construct(
        public ?int $errorCode = null,
        public ?string $message = null,
        public ?\DateTime $time = null,
    ) {
    }
}
