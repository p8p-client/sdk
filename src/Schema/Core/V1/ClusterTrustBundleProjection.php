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

use P8p\Sdk\Schema\Meta\V1\LabelSelector;

class ClusterTrustBundleProjection
{
    /**
     * @param string             $path          relative path from the volume root to write the bundle
     * @param LabelSelector|null $labelSelector Select all ClusterTrustBundles that match this label selector.  Only has effect if signerName is set.  Mutually-exclusive with name.  If unset, interpreted as "match nothing".  If set but empty, interpreted as "match everything".
     * @param string|null        $name          Select a single ClusterTrustBundle by object name.  Mutually-exclusive with signerName and labelSelector.
     * @param bool|null          $optional      If true, don't block pod startup if the referenced ClusterTrustBundle(s) aren't available.  If using name, then the named ClusterTrustBundle is allowed not to exist.  If using signerName, then the combination of signerName and labelSelector is allowed to match zero ClusterTrustBundles.
     * @param string|null        $signerName    Select all ClusterTrustBundles that match this signer name. Mutually-exclusive with name.  The contents of all selected ClusterTrustBundles will be unified and deduplicated.
     */
    public function __construct(
        public string $path,
        public ?LabelSelector $labelSelector = null,
        public ?string $name = null,
        public ?bool $optional = null,
        public ?string $signerName = null,
    ) {
    }
}
