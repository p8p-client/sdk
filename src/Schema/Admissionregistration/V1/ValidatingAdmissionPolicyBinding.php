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

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ValidatingAdmissionPolicyBinding')]
#[K8sSchema(kind: 'ValidatingAdmissionPolicyBinding', group: 'admissionregistration.k8s.io', version: 'v1')]
class ValidatingAdmissionPolicyBinding
{
    /**
     * @param ObjectMeta|null                           $metadata Standard object metadata; More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     * @param ValidatingAdmissionPolicyBindingSpec|null $spec     specification of the desired behavior of the ValidatingAdmissionPolicyBinding
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?ValidatingAdmissionPolicyBindingSpec $spec = null,
    ) {
    }
}
