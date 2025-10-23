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

namespace P8p\Sdk\Schema\Core\V1;

class ContainerResizePolicy
{
    /**
     * @param string $resourceName  Name of the resource to which this resource resize policy applies. Supported values: cpu, memory.
     * @param string $restartPolicy Restart policy to apply when specified resource is resized. If not specified, it defaults to NotRequired.
     */
    public function __construct(
        public string $resourceName,
        public string $restartPolicy,
    ) {
    }
}
