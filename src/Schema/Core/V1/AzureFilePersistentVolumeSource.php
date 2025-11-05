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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.AzureFilePersistentVolumeSource')]
class AzureFilePersistentVolumeSource
{
    /**
     * @param string      $secretName      secretName is the name of secret that contains Azure Storage Account Name and Key
     * @param string      $shareName       shareName is the azure Share Name
     * @param bool|null   $readOnly        readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in VolumeMounts.
     * @param string|null $secretNamespace secretNamespace is the namespace of the secret that contains Azure Storage Account Name and Key default is the same as the Pod
     */
    public function __construct(
        public string $secretName,
        public string $shareName,
        public ?bool $readOnly = null,
        public ?string $secretNamespace = null,
    ) {
    }
}
