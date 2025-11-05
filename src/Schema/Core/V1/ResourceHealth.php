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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ResourceHealth')]
class ResourceHealth
{
    /**
     * @param string      $resourceID ResourceID is the unique identifier of the resource. See the ResourceID type for more information.
     * @param string|null $health     Health of the resource. can be one of:
     *                                - Healthy: operates as normal
     *                                - Unhealthy: reported unhealthy. We consider this a temporary health issue
     *                                since we do not have a mechanism today to distinguish
     *                                temporary and permanent issues.
     *                                - Unknown: The status cannot be determined.
     *                                For example, Device Plugin got unregistered and hasn't been re-registered since.
     *
     * In future we may want to introduce the PermanentlyUnhealthy Status.
     */
    public function __construct(
        public string $resourceID,
        public ?string $health = null,
    ) {
    }
}
