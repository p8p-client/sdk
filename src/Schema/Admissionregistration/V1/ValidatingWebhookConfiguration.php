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

namespace P8p\Sdk\Schema\Admissionregistration\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;

#[K8sSchemaRef(name: 'io.k8s.api.admissionregistration.v1.ValidatingWebhookConfiguration')]
#[K8sSchema(kind: 'ValidatingWebhookConfiguration', group: 'admissionregistration.k8s.io', version: 'v1')]
class ValidatingWebhookConfiguration
{
    /**
     * @param ObjectMeta|null                    $metadata Standard object metadata; More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     * @param array<int, ValidatingWebhook>|null $webhooks webhooks is a list of webhooks and the affected resources and operations
     */
    public function __construct(
        public ?ObjectMeta $metadata = null,
        public ?array $webhooks = null,
    ) {
    }
}
