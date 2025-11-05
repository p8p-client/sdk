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

namespace P8p\Sdk\Schema\Storage\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.storage.v1.CSINodeSpec')]
class CSINodeSpec
{
    /**
     * @param array<int, CSINodeDriver> $drivers drivers is a list of information of all CSI Drivers existing on a node. If all drivers in the list are uninstalled, this can become empty.
     */
    public function __construct(
        public array $drivers,
    ) {
    }
}
