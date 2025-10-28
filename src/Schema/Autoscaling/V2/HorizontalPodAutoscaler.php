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

namespace P8p\Sdk\Schema\Autoscaling\V2;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'HorizontalPodAutoscaler', group: 'autoscaling', version: 'v2')]
class HorizontalPodAutoscaler
{
    /**
     * @param ObjectMeta|null                    $metadata metadata is the standard object metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param HorizontalPodAutoscalerSpec|null   $spec     spec is the specification for the behaviour of the autoscaler. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status.
     * @param HorizontalPodAutoscalerStatus|null $status   status is the current information about the autoscaler
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?HorizontalPodAutoscalerSpec $spec = null,
        public ?HorizontalPodAutoscalerStatus $status = null,
    ) {
    }
}
