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
