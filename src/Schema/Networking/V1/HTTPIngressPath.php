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

namespace P8p\Sdk\Schema\Networking\V1;

class HTTPIngressPath
{
    /**
     * @param IngressBackend $backend  backend defines the referenced service endpoint to which the traffic will be forwarded to
     * @param string         $pathType pathType determines the interpretation of the path matching. PathType can be one of the following values: * Exact: Matches the URL path exactly. * Prefix: Matches based on a URL path prefix split by '/'. Matching is
     *                                 done on a path element by element basis. A path element refers is the
     *                                 list of labels in the path split by the '/' separator. A request is a
     *                                 match for path p if every p is an element-wise prefix of p of the
     *                                 request path. Note that if the last element of the path is a substring
     *                                 of the last element in request path, it is not a match (e.g. /foo/bar
     *                                 matches /foo/bar/baz, but does not match /foo/barbaz).
     *                                 * ImplementationSpecific: Interpretation of the Path matching is up to
     *                                 the IngressClass. Implementations can treat this as a separate PathType
     *                                 or treat it identically to Prefix or Exact path types.
     *                                 Implementations are required to support all path types.
     *
     * Possible enum values:
     *  - `"Exact"` matches the URL path exactly and with case sensitivity.
     *  - `"ImplementationSpecific"` matching is up to the IngressClass. Implementations can treat this as a separate PathType or treat it identically to Prefix or Exact path types.
     *  - `"Prefix"` matches based on a URL path prefix split by '/'. Matching is case sensitive and done on a path element by element basis. A path element refers to the list of labels in the path split by the '/' separator. A request is a match for path p if every p is an element-wise prefix of p of the request path. Note that if the last element of the path is a substring of the last element in request path, it is not a match (e.g. /foo/bar matches /foo/bar/baz, but does not match /foo/barbaz). If multiple matching paths exist in an Ingress spec, the longest matching path is given priority. Examples: - /foo/bar does not match requests to /foo/barbaz - /foo/bar matches request to /foo/bar and /foo/bar/baz - /foo and /foo/ both match requests to /foo and /foo/. If both paths are present in an Ingress spec, the longest matching path (/foo/) is given priority.
     * @param string|null $path path is matched against the path of an incoming request. Currently it can contain characters disallowed from the conventional "path" part of a URL as defined by RFC 3986. Paths must begin with a '/' and must be present when using PathType with value "Exact" or "Prefix".
     */
    public function __construct(
        public IngressBackend $backend,
        public string $pathType,
        public ?string $path = null,
    ) {
    }
}
