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

namespace P8p\Sdk\Schema\Certificates\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ListMeta;

#[K8sSchema(kind: 'CertificateSigningRequestList', apiVersion: 'v1')]
class CertificateSigningRequestList
{
    /**
     * @param array<int, CertificateSigningRequest> $items items is a collection of CertificateSigningRequest objects
     */
    public function __construct(
        public array $items,
        public ?ListMeta $metadata = null,
    ) {
    }
}
