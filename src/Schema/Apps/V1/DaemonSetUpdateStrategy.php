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

namespace P8p\Sdk\Schema\Apps\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.apps.v1.DaemonSetUpdateStrategy')]
class DaemonSetUpdateStrategy
{
    /**
     * @param RollingUpdateDaemonSet|null $rollingUpdate Rolling update config params. Present only if type = "RollingUpdate".
     * @param string|null                 $type          Type of daemon set update. Can be "RollingUpdate" or "OnDelete". Default is RollingUpdate.
     *
     * Possible enum values:
     *  - `"OnDelete"` Replace the old daemons only when it's killed
     *  - `"RollingUpdate"` Replace the old daemons by new ones using rolling update i.e replace them on each node one after the other.
     */
    public function __construct(
        public ?RollingUpdateDaemonSet $rollingUpdate = null,
        public ?string $type = null,
    ) {
    }
}
