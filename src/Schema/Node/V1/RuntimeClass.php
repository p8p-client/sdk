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

namespace P8p\Sdk\Schema\Node\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Sdk\Schema\Meta\V1\ObjectMeta;

#[K8sSchema(kind: 'RuntimeClass', apiVersion: 'v1')]
class RuntimeClass
{
    /**
     * @param string          $handler    handler specifies the underlying runtime and configuration that the CRI implementation will use to handle pods of this class. The possible values are specific to the node & CRI configuration.  It is assumed that all handlers are available on every node, and handlers of the same name are equivalent on every node. For example, a handler called "runc" might specify that the runc OCI runtime (using native Linux containers) will be used to run the containers in a pod. The Handler must be lowercase, conform to the DNS Label (RFC 1123) requirements, and is immutable.
     * @param ObjectMeta|null $metadata   More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param Overhead|null   $overhead   overhead represents the resource overhead associated with running a pod for a given RuntimeClass. For more details, see
     *                                    https://kubernetes.io/docs/concepts/scheduling-eviction/pod-overhead/
     * @param Scheduling|null $scheduling scheduling holds the scheduling constraints to ensure that pods running with this RuntimeClass are scheduled to nodes that support it. If scheduling is nil, this RuntimeClass is assumed to be supported by all nodes.
     */
    public function __construct(
        public string $handler,
        public ?ObjectMeta $metadata = null,
        public ?Overhead $overhead = null,
        public ?Scheduling $scheduling = null,
    ) {
    }
}
