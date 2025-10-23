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

class GitRepoVolumeSource
{
    /**
     * @param string      $repository repository is the URL
     * @param string|null $directory  directory is the target directory name. Must not contain or start with '..'.  If '.' is supplied, the volume directory will be the git repository.  Otherwise, if specified, the volume will contain the git repository in the subdirectory with the given name.
     * @param string|null $revision   revision is the commit hash for the specified revision
     */
    public function __construct(
        public string $repository,
        public ?string $directory = null,
        public ?string $revision = null,
    ) {
    }
}
