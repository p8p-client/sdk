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

namespace P8p\Sdk\Schema\Certificates\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.certificates.v1.CertificateSigningRequest')]
#[K8sSchema(kind: 'CertificateSigningRequest', group: 'certificates.k8s.io', version: 'v1')]
class CertificateSigningRequest
{
    /**
     * @param CertificateSigningRequestSpec        $spec   spec contains the certificate request, and is immutable after creation. Only the request, signerName, expirationSeconds, and usages fields can be set on creation. Other fields are derived by Kubernetes and cannot be modified by users.
     * @param CertificateSigningRequestStatus|null $status status contains information about whether the request is approved or denied, and the certificate issued by the signer, or the failure condition indicating signer failure
     */
    public function __construct(
        public CertificateSigningRequestSpec $spec,
        public ?ObjectMeta $metadata = null,
        public ?CertificateSigningRequestStatus $status = null,
    ) {
    }
}
