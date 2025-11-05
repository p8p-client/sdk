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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.FlockerVolumeSource')]
class FlockerVolumeSource
{
    /**
     * @param string|null $datasetName datasetName is Name of the dataset stored as metadata -> name on the dataset for Flocker should be considered as deprecated
     * @param string|null $datasetUUID datasetUUID is the UUID of the dataset. This is unique identifier of a Flocker dataset
     */
    public function __construct(
        public ?string $datasetName = null,
        public ?string $datasetUUID = null,
    ) {
    }
}
