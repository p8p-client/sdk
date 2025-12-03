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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.EnvFromSource')]
class EnvFromSource
{
    /**
     * @param ConfigMapEnvSource|null $configMapRef The ConfigMap to select from
     * @param string|null             $prefix       Optional text to prepend to the name of each environment variable. Must be a C_IDENTIFIER.
     * @param SecretEnvSource|null    $secretRef    The Secret to select from
     */
    public function __construct(
        public ?ConfigMapEnvSource $configMapRef = null,
        public ?string $prefix = null,
        public ?SecretEnvSource $secretRef = null,
    ) {
    }
}
