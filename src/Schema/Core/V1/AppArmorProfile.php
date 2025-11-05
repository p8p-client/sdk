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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.AppArmorProfile')]
class AppArmorProfile
{
    /**
     * @param string $type type indicates which kind of AppArmor profile will be applied. Valid options are:
     *                     Localhost - a profile pre-loaded on the node.
     *                     RuntimeDefault - the container runtime's default profile.
     *                     Unconfined - no AppArmor enforcement.
     *
     * Possible enum values:
     *  - `"Localhost"` indicates that a profile pre-loaded on the node should be used.
     *  - `"RuntimeDefault"` indicates that the container runtime's default AppArmor profile should be used.
     *  - `"Unconfined"` indicates that no AppArmor profile should be enforced.
     * @param string|null $localhostProfile localhostProfile indicates a profile loaded on the node that should be used. The profile must be preconfigured on the node to work. Must match the loaded name of the profile. Must be set if and only if type is "Localhost".
     */
    public function __construct(
        public string $type,
        public ?string $localhostProfile = null,
    ) {
    }
}
