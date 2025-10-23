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

namespace P8p\Sdk\Schema\Apiextensions\V1;

class CustomResourceSubresources
{
    /**
     * @param CustomResourceSubresourceScale|null $scale  scale indicates the custom resource should serve a `/scale` subresource that returns an `autoscaling/v1` Scale object
     * @param array<mixed>|null                   $status status indicates the custom resource should serve a `/status` subresource. When enabled: 1. requests to the custom resource primary endpoint ignore changes to the `status` stanza of the object. 2. requests to the custom resource `/status` subresource ignore changes to anything other than the `status` stanza of the object.
     */
    public function __construct(
        public ?CustomResourceSubresourceScale $scale = null,
        public ?array $status = null,
    ) {
    }
}
