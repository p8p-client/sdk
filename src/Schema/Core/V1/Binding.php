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

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.Binding')]
#[K8sSchema(kind: 'Binding', group: '', version: 'v1')]
class Binding
{
    /**
     * @param ObjectReference $target   the target object that you want to bind to the standard object
     * @param ObjectMeta|null $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public ObjectReference $target,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
