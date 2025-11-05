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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.SeccompProfile')]
class SeccompProfile
{
    /**
     * @param string $type type indicates which kind of seccomp profile will be applied. Valid options are:
     *
     * Localhost - a profile defined in a file on the node should be used. RuntimeDefault - the container runtime default profile should be used. Unconfined - no profile should be applied.
     *
     * Possible enum values:
     *  - `"Localhost"` indicates a profile defined in a file on the node should be used. The file's location relative to <kubelet-root-dir>/seccomp.
     *  - `"RuntimeDefault"` represents the default container runtime seccomp profile.
     *  - `"Unconfined"` indicates no seccomp profile is applied (A.K.A. unconfined).
     * @param string|null $localhostProfile localhostProfile indicates a profile defined in a file on the node should be used. The profile must be preconfigured on the node to work. Must be a descending path, relative to the kubelet's configured seccomp profile location. Must be set if type is "Localhost". Must NOT be set for any other type.
     */
    public function __construct(
        public string $type,
        public ?string $localhostProfile = null,
    ) {
    }
}
