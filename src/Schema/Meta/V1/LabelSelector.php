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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.LabelSelector')]
class LabelSelector
{
    /**
     * @param array<int, LabelSelectorRequirement>|null $matchExpressions matchExpressions is a list of label selector requirements. The requirements are ANDed.
     * @param array<mixed>|null                         $matchLabels      matchLabels is a map of {key,value} pairs. A single {key,value} in the matchLabels map is equivalent to an element of matchExpressions, whose key field is "key", the operator is "In", and the values array contains only "value". The requirements are ANDed.
     */
    public function __construct(
        public ?array $matchExpressions = null,
        public ?array $matchLabels = null,
    ) {
    }
}
