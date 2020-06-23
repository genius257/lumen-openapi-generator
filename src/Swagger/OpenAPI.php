<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * This is the root document object of the OpenAPI document.
 *
 * @see https://swagger.io/specification/#oasObject OpenAPI document
 */
class OpenAPI
{
    /**
     * REQUIRED. This string MUST be the semantic version number of the OpenAPI Specification version that the OpenAPI document uses. The openapi field SHOULD be used by tooling specifications and clients to interpret the OpenAPI document. This is not related to the API info.version string.
     *
     * @see https://semver.org/spec/v2.0.0.html semantic version number
     * @see https://swagger.io/specification/#versions OpenAPI Specification version
     * @see https://swagger.io/specification/#infoVersion info.version
     *
     * @required
     *
     * @var string
     */
    public $openapi = "3.0.2";

    /**
     * REQUIRED. Provides metadata about the API. The metadata MAY be used by tooling as required.
     *
     * @required
     *
     * @var Info
     */
    public $info;

    /**
     * An array of Server Objects, which provide connectivity information to a target server. If the servers property is not provided, or is an empty array, the default value would be a Server Object with a url value of /.
     *
     * @see https://swagger.io/specification/#serverObject Server Object
     * @see https://swagger.io/specification/#serverUrl url
     *
     * @var Server[]
     */
    public $servers = [];

    /**
     * REQUIRED. The available paths and operations for the API.
     *
     * @required
     *
     * @var Paths
     */
    public $paths;

    /**
     * An element to hold various schemas for the specification.
     *
     * @var Components
     */
    public $components;

    /**
     *  A declaration of which security mechanisms can be used across the API. The list of values includes alternative security requirement objects that can be used. Only one of the security requirement objects need to be satisfied to authorize a request. Individual operations can override this definition.
     *
     * @var SecurityRequirement[]
     */
    public $security = [];

    /**
     * A list of tags used by the specification with additional metadata. The order of the tags can be used to reflect on their order by the parsing tools. Not all tags that are used by the Operation Object must be declared. The tags that are not declared MAY be organized randomly or based on the tools' logic. Each tag name in the list MUST be unique.
     *
     * @see https://swagger.io/specification/#operationObject Operation Object
     *
     * @var Tag[]
     */
    public $tags = [];

    /**
     * Additional external documentation.
     *
     * @var ExternalDocumentation
     */
    public $externalDocs;
}
