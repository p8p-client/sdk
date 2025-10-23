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

class ExpressionWarning
{
    /**
     * @param string $fieldRef The path to the field that refers the expression. For example, the reference to the expression of the first item of validations is "spec.validations[0].expression"
     * @param string $warning  The content of type checking information in a human-readable form. Each line of the warning contains the type that the expression is checked against, followed by the type check error from the compiler.
     */
    public function __construct(
        public string $fieldRef,
        public string $warning,
    ) {
    }
}
