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
use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.Status')]
#[K8sSchema(kind: 'Status', group: '', version: 'v1')]
class Status
{
    /**
     * @param int|null           $code     suggested HTTP return code for this status, 0 if not set
     * @param StatusDetails|null $details  Extended data associated with the reason.  Each reason may define its own extended details. This field is optional and the data returned is not guaranteed to conform to any schema except that defined by the reason type.
     * @param string|null        $message  a human-readable description of the status of this operation
     * @param ListMeta|null      $metadata Standard list metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     * @param string|null        $reason   A machine-readable description of why this operation is in the "Failure" status. If this value is empty there is no information available. A Reason clarifies an HTTP status code but does not override it.
     * @param string|null        $status   Status of the operation. One of: "Success" or "Failure". More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function __construct(
        public ?int $code = null,
        public ?StatusDetails $details = null,
        public ?string $message = null,
        public ?ListMeta $metadata = null,
        public ?string $reason = null,
        public ?string $status = null,
    ) {
    }
}
