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

namespace P8p\Sdk\Schema\Networking\V1;

class IngressClassSpec
{
    /**
     * @param string|null                          $controller controller refers to the name of the controller that should handle this class. This allows for different "flavors" that are controlled by the same controller. For example, you may have different parameters for the same implementing controller. This should be specified as a domain-prefixed path no more than 250 characters in length, e.g. "acme.io/ingress-controller". This field is immutable.
     * @param IngressClassParametersReference|null $parameters parameters is a link to a custom resource containing additional configuration for the controller. This is optional if the controller does not require extra parameters.
     */
    public function __construct(
        public ?string $controller = null,
        public ?IngressClassParametersReference $parameters = null,
    ) {
    }
}
