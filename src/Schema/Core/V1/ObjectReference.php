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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.ObjectReference')]
class ObjectReference
{
    /**
     * @param string|null $apiVersion      API version of the referent
     * @param string|null $fieldPath       If referring to a piece of an object instead of an entire object, this string should contain a valid JSON/Go field access statement, such as desiredState.manifest.containers[2]. For example, if the object reference is to a container within a pod, this would take on a value like: "spec.containers{name}" (where "name" refers to the name of the container that triggered the event) or if no container name is specified "spec.containers[2]" (container with index 2 in this pod). This syntax is chosen only to have some well-defined way of referencing a part of an object.
     * @param string|null $kind            Kind of the referent. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     * @param string|null $name            Name of the referent. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     * @param string|null $namespace       Namespace of the referent. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces/
     * @param string|null $resourceVersion Specific resourceVersion to which this reference is made, if any. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     * @param string|null $uid             UID of the referent. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#uids
     */
    public function __construct(
        public ?string $apiVersion = null,
        public ?string $fieldPath = null,
        public ?string $kind = null,
        public ?string $name = null,
        public ?string $namespace = null,
        public ?string $resourceVersion = null,
        public ?string $uid = null,
    ) {
    }
}
