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

#[K8sSchema(kind: 'Deployment', apiVersion: 'v1')]
class Deployment
{
    /**
     * @param ObjectMeta|null       $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param DeploymentSpec|null   $spec     specification of the desired behavior of the Deployment
     * @param DeploymentStatus|null $status   most recently observed status of the Deployment
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?DeploymentSpec $spec = null,
        public ?DeploymentStatus $status = null,
    ) {
    }
}
