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

namespace P8p\Sdk\Schema\Apiregistration\V1;

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.kube-aggregator.pkg.apis.apiregistration.v1.APIServiceCondition')]
class APIServiceCondition
{
    /**
     * @param string         $status             Status is the status of the condition. Can be True, False, Unknown.
     * @param string         $type               type is the type of the condition
     * @param \DateTime|null $lastTransitionTime last time the condition transitioned from one status to another
     * @param string|null    $message            human-readable message indicating details about last transition
     * @param string|null    $reason             unique, one-word, CamelCase reason for the condition's last transition
     */
    public function __construct(
        public string $status,
        public string $type,
        public ?\DateTime $lastTransitionTime = null,
        public ?string $message = null,
        public ?string $reason = null,
    ) {
    }
}
