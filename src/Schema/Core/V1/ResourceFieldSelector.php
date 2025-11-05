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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ResourceFieldSelector')]
class ResourceFieldSelector
{
    /**
     * @param string            $resource      Required: resource to select
     * @param string|null       $containerName Container name: required for volumes, optional for env vars
     * @param float|string|null $divisor       Specifies the output format of the exposed resources, defaults to "1"
     */
    public function __construct(
        public string $resource,
        public ?string $containerName = null,
        public float|string|null $divisor = null,
    ) {
    }
}
