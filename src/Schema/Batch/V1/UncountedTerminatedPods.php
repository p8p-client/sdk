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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.batch.v1.UncountedTerminatedPods')]
class UncountedTerminatedPods
{
    /**
     * @param array<int, string>|null $failed    failed holds UIDs of failed Pods
     * @param array<int, string>|null $succeeded succeeded holds UIDs of succeeded Pods
     */
    public function __construct(
        public ?array $failed = null,
        public ?array $succeeded = null,
    ) {
    }
}
