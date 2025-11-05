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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.VolumeProjection')]
class VolumeProjection
{
    /**
     * @param ClusterTrustBundleProjection|null $clusterTrustBundle ClusterTrustBundle allows a pod to access the `.spec.trustBundle` field of ClusterTrustBundle objects in an auto-updating file.
     *
     * Alpha, gated by the ClusterTrustBundleProjection feature gate.
     *
     * ClusterTrustBundle objects can either be selected by name, or by the combination of signer name and a label selector.
     *
     * Kubelet performs aggressive normalization of the PEM contents written into the pod filesystem.  Esoteric PEM features such as inter-block comments and block headers are stripped.  Certificates are deduplicated. The ordering of certificates within the file is arbitrary, and Kubelet may change the order over time.
     * @param ConfigMapProjection|null           $configMap           configMap information about the configMap data to project
     * @param DownwardAPIProjection|null         $downwardAPI         downwardAPI information about the downwardAPI data to project
     * @param SecretProjection|null              $secret              secret information about the secret data to project
     * @param ServiceAccountTokenProjection|null $serviceAccountToken serviceAccountToken is information about the serviceAccountToken data to project
     */
    public function __construct(
        public ?ClusterTrustBundleProjection $clusterTrustBundle = null,
        public ?ConfigMapProjection $configMap = null,
        public ?DownwardAPIProjection $downwardAPI = null,
        public ?SecretProjection $secret = null,
        public ?ServiceAccountTokenProjection $serviceAccountToken = null,
    ) {
    }
}
