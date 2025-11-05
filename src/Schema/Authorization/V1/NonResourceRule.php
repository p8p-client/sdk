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

namespace P8p\Sdk\Schema\Authorization\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.authorization.v1.NonResourceRule')]
class NonResourceRule
{
    /**
     * @param array<int, string>      $verbs           Verb is a list of kubernetes non-resource API verbs, like: get, post, put, delete, patch, head, options.  "*" means all.
     * @param array<int, string>|null $nonResourceURLs NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but only as the full, final step in the path.  "*" means all.
     */
    public function __construct(
        public array $verbs,
        public ?array $nonResourceURLs = null,
    ) {
    }
}
