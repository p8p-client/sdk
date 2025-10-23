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

class CustomResourceDefinitionVersion
{
    /**
     * @param string                                          $name                     name is the version name, e.g. “v1”, “v2beta1”, etc. The custom resources are served under this version at `/apis/<group>/<version>/...` if `served` is true.
     * @param bool                                            $served                   served is a flag enabling/disabling this version from being served via REST APIs
     * @param bool                                            $storage                  storage indicates this version should be used when persisting custom resources to storage. There must be exactly one version with storage=true.
     * @param array<int, CustomResourceColumnDefinition>|null $additionalPrinterColumns additionalPrinterColumns specifies additional columns returned in Table output. See https://kubernetes.io/docs/reference/using-api/api-concepts/#receiving-resources-as-tables for details. If no columns are specified, a single column displaying the age of the custom resource is used.
     * @param bool|null                                       $deprecated               deprecated indicates this version of the custom resource API is deprecated. When set to true, API requests to this version receive a warning header in the server response. Defaults to false.
     * @param string|null                                     $deprecationWarning       deprecationWarning overrides the default warning returned to API clients. May only be set when `deprecated` is true. The default warning indicates this version is deprecated and recommends use of the newest served version of equal or greater stability, if one exists.
     * @param CustomResourceValidation|null                   $schema                   schema describes the schema used for validation, pruning, and defaulting of this version of the custom resource
     * @param array<int, SelectableField>|null                $selectableFields         selectableFields specifies paths to fields that may be used as field selectors. A maximum of 8 selectable fields are allowed. See https://kubernetes.io/docs/concepts/overview/working-with-objects/field-selectors
     * @param CustomResourceSubresources|null                 $subresources             subresources specify what subresources this version of the defined custom resource have
     */
    public function __construct(
        public string $name,
        public bool $served,
        public bool $storage,
        public ?array $additionalPrinterColumns = null,
        public ?bool $deprecated = null,
        public ?string $deprecationWarning = null,
        public ?CustomResourceValidation $schema = null,
        public ?array $selectableFields = null,
        public ?CustomResourceSubresources $subresources = null,
    ) {
    }
}
