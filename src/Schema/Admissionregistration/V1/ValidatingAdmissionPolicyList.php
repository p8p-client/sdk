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
use P8p\Sdk\Schema\Core\V1\ListMeta;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ValidatingAdmissionPolicyList')]
#[K8sSchema(kind: 'ValidatingAdmissionPolicyList', group: 'admissionregistration.k8s.io', version: 'v1')]
class ValidatingAdmissionPolicyList
{
    /**
     * @param array<int, ValidatingAdmissionPolicy> $items    list of ValidatingAdmissionPolicy
     * @param ListMeta|null                         $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
