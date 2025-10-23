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

class PersistentVolumeClaimVolumeSource
{
    /**
     * @param string    $claimName claimName is the name of a PersistentVolumeClaim in the same namespace as the pod using this volume. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     * @param bool|null $readOnly  readOnly Will force the ReadOnly setting in VolumeMounts. Default false.
     */
    public function __construct(
        public string $claimName,
        public ?bool $readOnly = null,
    ) {
    }
}
