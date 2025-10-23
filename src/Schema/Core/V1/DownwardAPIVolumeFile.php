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

class DownwardAPIVolumeFile
{
    /**
     * @param string                     $path             Required: Path is  the relative path name of the file to be created. Must not be absolute or contain the '..' path. Must be utf-8 encoded. The first item of the relative path must not start with '..'
     * @param ObjectFieldSelector|null   $fieldRef         required: Selects a field of the pod: only annotations, labels, name, namespace and uid are supported
     * @param int|null                   $mode             Optional: mode bits used to set permissions on this file, must be an octal value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON requires decimal values for mode bits. If not specified, the volume defaultMode will be used. This might be in conflict with other options that affect the file mode, like fsGroup, and the result can be other mode bits set.
     * @param ResourceFieldSelector|null $resourceFieldRef Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory, requests.cpu and requests.memory) are currently supported.
     */
    public function __construct(
        public string $path,
        public ?ObjectFieldSelector $fieldRef = null,
        public ?int $mode = null,
        public ?ResourceFieldSelector $resourceFieldRef = null,
    ) {
    }
}
