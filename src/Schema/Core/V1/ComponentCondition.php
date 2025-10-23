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

class ComponentCondition
{
    /**
     * @param string      $status  Status of the condition for a component. Valid values for "Healthy": "True", "False", or "Unknown".
     * @param string      $type    Type of condition for a component. Valid value: "Healthy"
     * @param string|null $error   Condition error code for a component. For example, a health check error code.
     * @param string|null $message Message about the condition for a component. For example, information about a health check.
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?string $error = null,
        public ?string $message = null,
    ) {
    }
}
