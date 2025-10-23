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

namespace P8p\Sdk\Schema\Meta\V1;

class LabelSelectorRequirement
{
    /**
     * @param string                  $key      key is the label key that the selector applies to
     * @param string                  $operator operator represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists and DoesNotExist.
     * @param array<int, string>|null $values   values is an array of string values. If the operator is In or NotIn, the values array must be non-empty. If the operator is Exists or DoesNotExist, the values array must be empty. This array is replaced during a strategic merge patch.
     */
    public function __construct(
        public string $key,
        public string $operator,
        public ?array $values = null,
    ) {
    }
}
