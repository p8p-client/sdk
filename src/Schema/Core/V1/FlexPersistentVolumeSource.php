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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.FlexPersistentVolumeSource')]
class FlexPersistentVolumeSource
{
    /**
     * @param string               $driver    driver is the name of the driver to use for this volume
     * @param string|null          $fsType    fsType is the Filesystem type to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". The default filesystem depends on FlexVolume script.
     * @param array<mixed>|null    $options   options is Optional: this field holds extra command options if any
     * @param bool|null            $readOnly  readOnly is Optional: defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     * @param SecretReference|null $secretRef secretRef is Optional: SecretRef is reference to the secret object containing sensitive information to pass to the plugin scripts. This may be empty if no secret object is specified. If the secret object contains more than one secret, all secrets are passed to the plugin scripts.
     */
    public function __construct(
        public string $driver,
        public ?string $fsType = null,
        public ?array $options = null,
        public ?bool $readOnly = null,
        public ?SecretReference $secretRef = null,
    ) {
    }
}
