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

namespace P8p\Sdk\Schema\Policy\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\DeleteOptions;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'Eviction', group: 'policy', version: 'v1')]
class Eviction
{
    /**
     * @param DeleteOptions|null $deleteOptions DeleteOptions may be provided
     * @param ObjectMeta|null    $metadata      objectMeta describes the pod that is being evicted
     */
    public function __construct(
        public ?DeleteOptions $deleteOptions = null,
        public ?ObjectMeta $metadata = null,
    ) {
    }
}
