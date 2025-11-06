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
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.StatefulSet')]
#[K8sSchema(kind: 'StatefulSet', group: 'apps', version: 'v1')]
class StatefulSet
{
    /**
     * @param ObjectMeta|null        $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param StatefulSetSpec|null   $spec     spec defines the desired identities of pods in this set
     * @param StatefulSetStatus|null $status   Status is the current status of Pods in this StatefulSet. This data may be out of date by some window of time.
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?StatefulSetSpec $spec = null,
        public ?StatefulSetStatus $status = null,
    ) {
    }
}
