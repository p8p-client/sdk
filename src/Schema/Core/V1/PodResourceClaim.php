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

class PodResourceClaim
{
    /**
     * @param string      $name              Name uniquely identifies this resource claim inside the pod. This must be a DNS_LABEL.
     * @param string|null $resourceClaimName ResourceClaimName is the name of a ResourceClaim object in the same namespace as this pod.
     *
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
     * @param string|null $resourceClaimTemplateName ResourceClaimTemplateName is the name of a ResourceClaimTemplate object in the same namespace as this pod.
     *
     * The template will be used to create a new ResourceClaim, which will be bound to this pod. When this pod is deleted, the ResourceClaim will also be deleted. The pod name and resource name, along with a generated component, will be used to form a unique name for the ResourceClaim, which will be recorded in pod.status.resourceClaimStatuses.
     *
     * This field is immutable and no changes will be made to the corresponding ResourceClaim by the control plane after creating the ResourceClaim.
     *
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
     */
    public function __construct(
        public string $name,
        public ?string $resourceClaimName = null,
        public ?string $resourceClaimTemplateName = null,
    ) {
    }
}
