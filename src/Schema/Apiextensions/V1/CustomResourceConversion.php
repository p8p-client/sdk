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

class CustomResourceConversion
{
    /**
     * @param string                 $strategy strategy specifies how custom resources are converted between versions. Allowed values are: - `"None"`: The converter only change the apiVersion and would not touch any other field in the custom resource. - `"Webhook"`: API Server will call to an external webhook to do the conversion. Additional information
     *                                         is needed for this option. This requires spec.preserveUnknownFields to be false, and spec.conversion.webhook to be set.
     * @param WebhookConversion|null $webhook  webhook describes how to call the conversion webhook. Required when `strategy` is set to `"Webhook"`.
     */
    public function __construct(
        public string $strategy,
        public ?WebhookConversion $webhook = null,
    ) {
    }
}
