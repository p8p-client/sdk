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

class HostPathVolumeSource
{
    /**
     * @param string      $path path of the directory on the host. If the path is a symlink, it will follow the link to the real path. More info: https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     * @param string|null $type type for HostPath Volume Defaults to "" More info: https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     *
     * Possible enum values:
     *  - `""` For backwards compatible, leave it empty if unset
     *  - `"BlockDevice"` A block device must exist at the given path
     *  - `"CharDevice"` A character device must exist at the given path
     *  - `"Directory"` A directory must exist at the given path
     *  - `"DirectoryOrCreate"` If nothing exists at the given path, an empty directory will be created there as needed with file mode 0755, having the same group and ownership with Kubelet.
     *  - `"File"` A file must exist at the given path
     *  - `"FileOrCreate"` If nothing exists at the given path, an empty file will be created there as needed with file mode 0644, having the same group and ownership with Kubelet.
     *  - `"Socket"` A UNIX socket must exist at the given path
     */
    public function __construct(
        public string $path,
        public ?string $type = null,
    ) {
    }
}
