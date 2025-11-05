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

#[K8sSchemaRef(name: 'io.k8s.api.certificates.v1.CertificateSigningRequestCondition')]
class CertificateSigningRequestCondition
{
    /**
     * @param string $status status of the condition, one of True, False, Unknown. Approved, Denied, and Failed conditions may not be "False" or "Unknown".
     * @param string $type   type of the condition. Known conditions are "Approved", "Denied", and "Failed".
     *
     * An "Approved" condition is added via the /approval subresource, indicating the request was approved and should be issued by the signer.
     *
     * A "Denied" condition is added via the /approval subresource, indicating the request was denied and should not be issued by the signer.
     *
     * A "Failed" condition is added via the /status subresource, indicating the signer failed to issue the certificate.
     *
     * Approved and Denied conditions are mutually exclusive. Approved, Denied, and Failed conditions cannot be removed once added.
     *
     * Only one condition of a given type is allowed.
     * @param \DateTime|null $lastTransitionTime lastTransitionTime is the time the condition last transitioned from one status to another. If unset, when a new condition type is added or an existing condition's status is changed, the server defaults this to the current time.
     * @param \DateTime|null $lastUpdateTime     lastUpdateTime is the time of the last update to this condition
     * @param string|null    $message            message contains a human readable message with details about the request state
     * @param string|null    $reason             reason indicates a brief reason for the request state
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?\DateTime $lastTransitionTime = null,
        public ?\DateTime $lastUpdateTime = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
