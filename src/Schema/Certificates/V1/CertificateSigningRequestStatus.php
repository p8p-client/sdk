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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.certificates.v1.CertificateSigningRequestStatus')]
class CertificateSigningRequestStatus
{
    /**
     * @param string|null $certificate certificate is populated with an issued certificate by the signer after an Approved condition is present. This field is set via the /status subresource. Once populated, this field is immutable.
     *
     * If the certificate signing request is denied, a condition of type "Denied" is added and this field remains empty. If the signer cannot issue the certificate, a condition of type "Failed" is added and this field remains empty.
     *
     * Validation requirements:
     *  1. certificate must contain one or more PEM blocks.
     *  2. All PEM blocks must have the "CERTIFICATE" label, contain no headers, and the encoded data
     *   must be a BER-encoded ASN.1 Certificate structure as described in section 4 of RFC5280.
     *  3. Non-PEM content may appear before or after the "CERTIFICATE" PEM blocks and is unvalidated,
     *   to allow for explanatory text as described in section 5.2 of RFC7468.
     *
     * If more than one PEM block is present, and the definition of the requested spec.signerName does not indicate otherwise, the first block is the issued certificate, and subsequent blocks should be treated as intermediate certificates and presented in TLS handshakes.
     *
     * The certificate is encoded in PEM format.
     *
     * When serialized as JSON or YAML, the data is additionally base64-encoded, so it consists of:
     *
     *     base64(
     *     -----BEGIN CERTIFICATE-----
     *     ...
     *     -----END CERTIFICATE-----
     *     )
     * @param array<int, CertificateSigningRequestCondition>|null $conditions conditions applied to the request. Known conditions are "Approved", "Denied", and "Failed".
     */
    public function __construct(
        public ?string $certificate = null,
        public ?array $conditions = null,
    ) {
    }
}
