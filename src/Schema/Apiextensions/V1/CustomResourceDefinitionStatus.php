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

namespace P8p\Sdk\Schema\Apiextensions\V1;

class CustomResourceDefinitionStatus
{
    /**
     * @param CustomResourceDefinitionNames|null                 $acceptedNames  acceptedNames are the names that are actually being used to serve discovery. They may be different than the names in spec.
     * @param array<int, CustomResourceDefinitionCondition>|null $conditions     conditions indicate state for particular aspects of a CustomResourceDefinition
     * @param array<int, string>|null                            $storedVersions storedVersions lists all versions of CustomResources that were ever persisted. Tracking these versions allows a migration path for stored versions in etcd. The field is mutable so a migration controller can finish a migration to another version (ensuring no old objects are left in storage), and then remove the rest of the versions from this list. Versions may not be removed from `spec.versions` while they exist in this list.
     */
    public function __construct(
        public ?CustomResourceDefinitionNames $acceptedNames = null,
        public ?array $conditions = null,
        public ?array $storedVersions = null,
    ) {
    }
}
