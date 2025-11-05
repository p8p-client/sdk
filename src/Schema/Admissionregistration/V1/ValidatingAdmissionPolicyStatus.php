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

use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\Condition;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ValidatingAdmissionPolicyStatus')]
class ValidatingAdmissionPolicyStatus
{
    /**
     * @param array<int, Condition>|null $conditions         the conditions represent the latest available observations of a policy's current state
     * @param int|null                   $observedGeneration the generation observed by the controller
     * @param TypeChecking|null          $typeChecking       The results of type checking for each expression. Presence of this field indicates the completion of the type checking.
     */
    public function __construct(
        public ?array $conditions = null,
        public ?int $observedGeneration = null,
        public ?TypeChecking $typeChecking = null,
    ) {
    }
}
