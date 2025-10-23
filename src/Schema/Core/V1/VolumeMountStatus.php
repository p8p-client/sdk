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

class VolumeMountStatus
{
    /**
     * @param string      $mountPath         mountPath corresponds to the original VolumeMount
     * @param string      $name              name corresponds to the name of the original VolumeMount
     * @param bool|null   $readOnly          readOnly corresponds to the original VolumeMount
     * @param string|null $recursiveReadOnly RecursiveReadOnly must be set to Disabled, Enabled, or unspecified (for non-readonly mounts). An IfPossible value in the original VolumeMount must be translated to Disabled or Enabled, depending on the mount result.
     */
    public function __construct(
        public string $mountPath,
        public string $name,
        public ?bool $readOnly = null,
        public ?string $recursiveReadOnly = null,
    ) {
    }
}
