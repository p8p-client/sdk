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

namespace P8p\Sdk\Schema\Admissionregistration\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ValidatingAdmissionPolicy')]
#[K8sSchema(kind: 'ValidatingAdmissionPolicy', group: 'admissionregistration.k8s.io', version: 'v1')]
class ValidatingAdmissionPolicy
{
    /**
     * @param ObjectMeta|null                      $metadata Standard object metadata; More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     * @param ValidatingAdmissionPolicySpec|null   $spec     specification of the desired behavior of the ValidatingAdmissionPolicy
     * @param ValidatingAdmissionPolicyStatus|null $status   The status of the ValidatingAdmissionPolicy, including warnings that are useful to determine if the policy behaves in the expected way. Populated by the system. Read-only.
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?ValidatingAdmissionPolicySpec $spec = null,
        public ?ValidatingAdmissionPolicyStatus $status = null,
    ) {
    }
}
