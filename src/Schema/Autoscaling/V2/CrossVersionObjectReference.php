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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.autoscaling.v2.CrossVersionObjectReference')]
class CrossVersionObjectReference
{
    /**
     * @param string      $kind       kind is the kind of the referent; More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     * @param string      $name       name is the name of the referent; More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     * @param string|null $apiVersion apiVersion is the API version of the referent
     */
    public function __construct(
        public string $kind,
        public string $name,
        public ?string $apiVersion = null,
    ) {
    }
}
