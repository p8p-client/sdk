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

class ResourceQuotaStatus
{
    /**
     * @param array<mixed>|null $hard Hard is the set of enforced hard limits for each named resource. More info: https://kubernetes.io/docs/concepts/policy/resource-quotas/
     * @param array<mixed>|null $used used is the current observed total usage of the resource in the namespace
     */
    public function __construct(
        public ?array $hard = null,
        public ?array $used = null,
    ) {
    }
}
