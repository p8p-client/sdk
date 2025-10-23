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

class EnvFromSource
{
    /**
     * @param ConfigMapEnvSource|null $configMapRef The ConfigMap to select from
     * @param string|null             $prefix       An optional identifier to prepend to each key in the ConfigMap. Must be a C_IDENTIFIER.
     * @param SecretEnvSource|null    $secretRef    The Secret to select from
     */
    public function __construct(
        public ?ConfigMapEnvSource $configMapRef = null,
        public ?string $prefix = null,
        public ?SecretEnvSource $secretRef = null,
    ) {
    }
}
