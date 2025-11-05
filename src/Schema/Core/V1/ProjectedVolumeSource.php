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

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ProjectedVolumeSource')]
class ProjectedVolumeSource
{
    /**
     * @param int|null                          $defaultMode defaultMode are the mode bits used to set permissions on created files by default. Must be an octal value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON requires decimal values for mode bits. Directories within the path are not affected by this setting. This might be in conflict with other options that affect the file mode, like fsGroup, and the result can be other mode bits set.
     * @param array<int, VolumeProjection>|null $sources     sources is the list of volume projections. Each entry in this list handles one source.
     */
    public function __construct(
        public ?int $defaultMode = null,
        public ?array $sources = null,
    ) {
    }
}
