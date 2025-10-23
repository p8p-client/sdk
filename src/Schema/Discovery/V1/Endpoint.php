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

namespace P8p\Sdk\Schema\Discovery\V1;

use P8p\Sdk\Schema\Core\V1\ObjectReference;

class Endpoint
{
    /**
     * @param array<int, string>      $addresses          addresses of this endpoint. The contents of this field are interpreted according to the corresponding EndpointSlice addressType field. Consumers must handle different types of addresses in the context of their own capabilities. This must contain at least one address but no more than 100. These are all assumed to be fungible and clients may choose to only use the first element. Refer to: https://issue.k8s.io/106267
     * @param EndpointConditions|null $conditions         conditions contains information about the current status of the endpoint
     * @param array<mixed>|null       $deprecatedTopology deprecatedTopology contains topology information part of the v1beta1 API. This field is deprecated, and will be removed when the v1beta1 API is removed (no sooner than kubernetes v1.24).  While this field can hold values, it is not writable through the v1 API, and any attempts to write to it will be silently ignored. Topology information can be found in the zone and nodeName fields instead.
     * @param EndpointHints|null      $hints              hints contains information associated with how an endpoint should be consumed
     * @param string|null             $hostname           hostname of this endpoint. This field may be used by consumers of endpoints to distinguish endpoints from each other (e.g. in DNS names). Multiple endpoints which use the same hostname should be considered fungible (e.g. multiple A values in DNS). Must be lowercase and pass DNS Label (RFC 1123) validation.
     * @param string|null             $nodeName           nodeName represents the name of the Node hosting this endpoint. This can be used to determine endpoints local to a Node.
     * @param ObjectReference|null    $targetRef          targetRef is a reference to a Kubernetes object that represents this endpoint
     * @param string|null             $zone               zone is the name of the Zone this endpoint exists in
     */
    public function __construct(
        public array $addresses,
        public ?EndpointConditions $conditions = null,
        public ?array $deprecatedTopology = null,
        public ?EndpointHints $hints = null,
        public ?string $hostname = null,
        public ?string $nodeName = null,
        public ?ObjectReference $targetRef = null,
        public ?string $zone = null,
    ) {
    }
}
