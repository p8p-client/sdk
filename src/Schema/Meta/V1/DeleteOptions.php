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

use P8p\Client\Attribute\K8sSchema;

#[K8sSchema(kind: 'DeleteOptions', apiVersion: 'v1')]
class DeleteOptions
{
    /**
     * @param array<int, string>|null $dryRun                                           When present, indicates that modifications should not be persisted. An invalid or unrecognized dryRun directive will result in an error response and no further processing of the request. Valid values are: - All: all dry run stages will be processed
     * @param int|null                $gracePeriodSeconds                               The duration in seconds before the object should be deleted. Value must be non-negative integer. The value zero indicates delete immediately. If this value is nil, the default grace period for the specified type will be used. Defaults to a per object value if not specified. zero means delete immediately.
     * @param bool|null               $ignoreStoreReadErrorWithClusterBreakingPotential if set to true, it will trigger an unsafe deletion of the resource in case the normal deletion flow fails with a corrupt object error. A resource is considered corrupt if it can not be retrieved from the underlying storage successfully because of a) its data can not be transformed e.g. decryption failure, or b) it fails to decode into an object. NOTE: unsafe deletion ignores finalizer constraints, skips precondition checks, and removes the object from the storage. WARNING: This may potentially break the cluster if the workload associated with the resource being unsafe-deleted relies on normal deletion flow. Use only if you REALLY know what you are doing. The default value is false, and the user must opt in to enable it
     * @param bool|null               $orphanDependents                                 Deprecated: please use the PropagationPolicy, this field will be deprecated in 1.7. Should the dependent objects be orphaned. If true/false, the "orphan" finalizer will be added to/removed from the object's finalizers list. Either this field or PropagationPolicy may be set, but not both.
     * @param Preconditions|null      $preconditions                                    Must be fulfilled before a deletion is carried out. If not possible, a 409 Conflict status will be returned.
     * @param string|null             $propagationPolicy                                Whether and how garbage collection will be performed. Either this field or OrphanDependents may be set, but not both. The default policy is decided by the existing finalizer set in the metadata.finalizers and the resource-specific default policy. Acceptable values are: 'Orphan' - orphan the dependents; 'Background' - allow the garbage collector to delete the dependents in the background; 'Foreground' - a cascading policy that deletes all dependents in the foreground.
     */
    public function __construct(
        public ?array $dryRun = null,
        public ?int $gracePeriodSeconds = null,
        public ?bool $ignoreStoreReadErrorWithClusterBreakingPotential = null,
        public ?bool $orphanDependents = null,
        public ?Preconditions $preconditions = null,
        public ?string $propagationPolicy = null,
    ) {
    }
}
