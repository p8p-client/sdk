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

namespace P8p\Sdk\Schema\Apiregistration\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.kube-aggregator.pkg.apis.apiregistration.v1.APIService')]
#[K8sSchema(kind: 'APIService', group: 'apiregistration.k8s.io', version: 'v1')]
class APIService
{
    /**
     * @param ObjectMeta|null       $metadata Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param APIServiceSpec|null   $spec     Spec contains information for locating and communicating with a server
     * @param APIServiceStatus|null $status   Status contains derived information about an API server
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?APIServiceSpec $spec = null,
        public ?APIServiceStatus $status = null,
    ) {
    }
}
