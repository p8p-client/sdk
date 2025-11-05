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

namespace P8p\Sdk\Schema\Batch\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.batch.v1.Job')]
#[K8sSchema(kind: 'Job', group: 'batch', version: 'v1')]
class Job
{
    /**
     * @param ObjectMeta|null $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param JobSpec|null    $spec     Specification of the desired behavior of a job. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     * @param JobStatus|null  $status   Current status of a job. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?JobSpec $spec = null,
        public ?JobStatus $status = null,
    ) {
    }
}
