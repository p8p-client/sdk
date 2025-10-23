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

class Affinity
{
    /**
     * @param NodeAffinity|null    $nodeAffinity    describes node affinity scheduling rules for the pod
     * @param PodAffinity|null     $podAffinity     Describes pod affinity scheduling rules (e.g. co-locate this pod in the same node, zone, etc. as some other pod(s)).
     * @param PodAntiAffinity|null $podAntiAffinity Describes pod anti-affinity scheduling rules (e.g. avoid putting this pod in the same node, zone, etc. as some other pod(s)).
     */
    public function __construct(
        public ?NodeAffinity $nodeAffinity = null,
        public ?PodAffinity $podAffinity = null,
        public ?PodAntiAffinity $podAntiAffinity = null,
    ) {
    }
}
