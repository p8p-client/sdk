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

#[K8sSchemaRef(name: 'io.k8s.apimachinery.pkg.apis.meta.v1.OwnerReference')]
class OwnerReference
{
    /**
     * @param string    $apiVersion         API version of the referent
     * @param string    $kind               Kind of the referent. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     * @param string    $name               Name of the referent. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     * @param string    $uid                UID of the referent. More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     * @param bool|null $blockOwnerDeletion If true, AND if the owner has the "foregroundDeletion" finalizer, then the owner cannot be deleted from the key-value store until this reference is removed. See https://kubernetes.io/docs/concepts/architecture/garbage-collection/#foreground-deletion for how the garbage collector interacts with this field and enforces the foreground deletion. Defaults to false. To set this field, a user needs "delete" permission of the owner, otherwise 422 (Unprocessable Entity) will be returned.
     * @param bool|null $controller         if true, this reference points to the managing controller
     */
    public function __construct(
        public string $apiVersion,
        public string $kind,
        public string $name,
        public string $uid,
        public ?bool $blockOwnerDeletion = null,
        public ?bool $controller = null,
    ) {
    }
}
