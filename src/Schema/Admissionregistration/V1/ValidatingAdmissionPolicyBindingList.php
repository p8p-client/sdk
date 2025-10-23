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
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchema(kind: 'ValidatingAdmissionPolicyBindingList', apiVersion: 'v1')]
class ValidatingAdmissionPolicyBindingList
{
    /**
     * @param array<int, ValidatingAdmissionPolicyBinding> $items    list of PolicyBinding
     * @param ListMeta|null                                $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
