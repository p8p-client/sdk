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

class DeploymentStrategy
{
    /**
     * @param RollingUpdateDeployment|null $rollingUpdate Rolling update config params. Present only if DeploymentStrategyType = RollingUpdate.
     * @param string|null                  $type          Type of deployment. Can be "Recreate" or "RollingUpdate". Default is RollingUpdate.
     *
     * Possible enum values:
     *  - `"Recreate"` Kill all existing pods before creating new ones.
     *  - `"RollingUpdate"` Replace the old ReplicaSets by new one using rolling update i.e gradually scale down the old ReplicaSets and scale up the new one.
     */
    public function __construct(
        public ?RollingUpdateDeployment $rollingUpdate = null,
        public ?string $type = null,
    ) {
    }
}
