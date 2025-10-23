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

namespace P8p\Sdk\Schema\Apps\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'ControllerRevision', apiVersion: 'v1')]
class ControllerRevision
{
    /**
     * @param int                      $revision revision indicates the revision of the state represented by Data
     * @param array<mixed>|object|null $data     data is the serialized representation of the state
     * @param ObjectMeta|null          $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function __construct(
        public int $revision,
        public array|object|null $data = null,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
