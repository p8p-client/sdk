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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ConfigMapNodeConfigSource')]
class ConfigMapNodeConfigSource
{
    /**
     * @param string      $kubeletConfigKey kubeletConfigKey declares which key of the referenced ConfigMap corresponds to the KubeletConfiguration structure This field is required in all cases
     * @param string      $name             Name is the metadata.name of the referenced ConfigMap. This field is required in all cases.
     * @param string      $namespace        Namespace is the metadata.namespace of the referenced ConfigMap. This field is required in all cases.
     * @param string|null $resourceVersion  ResourceVersion is the metadata.ResourceVersion of the referenced ConfigMap. This field is forbidden in Node.Spec, and required in Node.Status.
     * @param string|null $uid              UID is the metadata.UID of the referenced ConfigMap. This field is forbidden in Node.Spec, and required in Node.Status.
     */
    public function __construct(
        public string $kubeletConfigKey,
        public string $name,
        public string $namespace,
        public ?string $resourceVersion = null,
        public ?string $uid = null,
    ) {
    }
}
