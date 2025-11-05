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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.apiextensions-apiserver.pkg.apis.apiextensions.v1.WebhookConversion')]
class WebhookConversion
{
    /**
     * @param array<int, string>       $conversionReviewVersions conversionReviewVersions is an ordered list of preferred `ConversionReview` versions the Webhook expects. The API server will use the first version in the list which it supports. If none of the versions specified in this list are supported by API server, conversion will fail for the custom resource. If a persisted Webhook configuration specifies allowed versions and does not include any versions known to the API Server, calls to the webhook will fail.
     * @param WebhookClientConfig|null $clientConfig             clientConfig is the instructions for how to call the webhook if strategy is `Webhook`
     */
    public function __construct(
        public array $conversionReviewVersions,
        public ?WebhookClientConfig $clientConfig = null,
    ) {
    }
}
