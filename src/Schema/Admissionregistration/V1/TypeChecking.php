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

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.TypeChecking')]
class TypeChecking
{
    /**
     * @param array<int, ExpressionWarning>|null $expressionWarnings the type checking warnings for each expression
     */
    public function __construct(
        public ?array $expressionWarnings = null,
    ) {
    }
}
