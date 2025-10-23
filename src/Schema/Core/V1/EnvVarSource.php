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

class EnvVarSource
{
    /**
     * @param ConfigMapKeySelector|null  $configMapKeyRef  selects a key of a ConfigMap
     * @param ObjectFieldSelector|null   $fieldRef         Selects a field of the pod: supports metadata.name, metadata.namespace, `metadata.labels['<KEY>']`, `metadata.annotations['<KEY>']`, spec.nodeName, spec.serviceAccountName, status.hostIP, status.podIP, status.podIPs.
     * @param ResourceFieldSelector|null $resourceFieldRef Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory, limits.ephemeral-storage, requests.cpu, requests.memory and requests.ephemeral-storage) are currently supported.
     * @param SecretKeySelector|null     $secretKeyRef     Selects a key of a secret in the pod's namespace
     */
    public function __construct(
        public ?ConfigMapKeySelector $configMapKeyRef = null,
        public ?ObjectFieldSelector $fieldRef = null,
        public ?ResourceFieldSelector $resourceFieldRef = null,
        public ?SecretKeySelector $secretKeyRef = null,
    ) {
    }
}
