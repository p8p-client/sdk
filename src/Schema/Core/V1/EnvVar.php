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

namespace P8p\Sdk\Schema\Core\V1;

class EnvVar
{
    /**
     * @param string            $name      Name of the environment variable. Must be a C_IDENTIFIER.
     * @param string|null       $value     Variable references $(VAR_NAME) are expanded using the previously defined environment variables in the container and any service environment variables. If a variable cannot be resolved, the reference in the input string will be unchanged. Double $$ are reduced to a single $, which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable exists or not. Defaults to "".
     * @param EnvVarSource|null $valueFrom Source for the environment variable's value. Cannot be used if value is not empty.
     */
    public function __construct(
        public string $name,
        public ?string $value = null,
        public ?EnvVarSource $valueFrom = null,
    ) {
    }
}
