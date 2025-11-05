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

namespace P8p\Sdk\Schema\Admissionregistration\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ParamKind')]
class ParamKind
{
    /**
     * @param string|null $apiVersion APIVersion is the API group version the resources belong to. In format of "group/version". Required.
     * @param string|null $kind       Kind is the API kind the resources belong to. Required.
     */
    public function __construct(
        public ?string $apiVersion = null,
        public ?string $kind = null,
    ) {
    }
}
