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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.TopologySelectorLabelRequirement')]
class TopologySelectorLabelRequirement
{
    /**
     * @param string             $key    the label key that the selector applies to
     * @param array<int, string> $values An array of string values. One value must match the label to be selected. Each entry in Values is ORed.
     */
    public function __construct(
        public string $key,
        public array $values,
    ) {
    }
}
