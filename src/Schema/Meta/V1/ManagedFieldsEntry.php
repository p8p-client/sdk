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

namespace P8p\Sdk\Schema\Meta\V1;

class ManagedFieldsEntry
{
    /**
     * @param string|null       $apiVersion  APIVersion defines the version of this resource that this field set applies to. The format is "group/version" just like the top-level APIVersion field. It is necessary to track the version of a field set because it cannot be automatically converted.
     * @param string|null       $fieldsType  FieldsType is the discriminator for the different fields format and version. There is currently only one possible value: "FieldsV1"
     * @param array<mixed>|null $fieldsV1    fieldsV1 holds the first JSON version format as described in the "FieldsV1" type
     * @param string|null       $manager     manager is an identifier of the workflow managing these fields
     * @param string|null       $operation   Operation is the type of operation which lead to this ManagedFieldsEntry being created. The only valid values for this field are 'Apply' and 'Update'.
     * @param string|null       $subresource Subresource is the name of the subresource used to update that object, or empty string if the object was updated through the main resource. The value of this field is used to distinguish between managers, even if they share the same name. For example, a status update will be distinct from a regular update using the same manager name. Note that the APIVersion field is not related to the Subresource field and it always corresponds to the version of the main resource.
     * @param \DateTime|null    $time        Time is the timestamp of when the ManagedFields entry was added. The timestamp will also be updated if a field is added, the manager changes any of the owned fields value or removes a field. The timestamp does not update when a field is removed from the entry because another manager took it over.
     */
    public function __construct(
        public ?string $apiVersion = null,
        public ?string $fieldsType = null,
        public ?array $fieldsV1 = null,
        public ?string $manager = null,
        public ?string $operation = null,
        public ?string $subresource = null,
        public ?\DateTime $time = null,
    ) {
    }
}
