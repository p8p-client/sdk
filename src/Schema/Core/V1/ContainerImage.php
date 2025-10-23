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

class ContainerImage
{
    /**
     * @param array<int, string>|null $names     Names by which this image is known. e.g. ["kubernetes.example/hyperkube:v1.0.7", "cloud-vendor.registry.example/cloud-vendor/hyperkube:v1.0.7"]
     * @param int|null                $sizeBytes the size of the image in bytes
     */
    public function __construct(
        public ?array $names = null,
        public ?int $sizeBytes = null,
    ) {
    }
}
