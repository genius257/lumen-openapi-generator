<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * A container for the expected responses of an operation. The container maps a HTTP response code to the expected response.
 *
 * The documentation is not necessarily expected to cover all possible HTTP response codes because they may not be known in advance. However, documentation is expected to cover a successful operation response and any known errors.
 *
 * The default MAY be used as a default response object for all HTTP codes that are not covered individually by the specification.
 *
 * The Responses Object MUST contain at least one response code, and it SHOULD be the response for a successful operation call.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Responses extends Swagger
{
    /**
     * @var PathItem[]
     */
    protected $items = [];

    public function __construct()
    {
        /**
         * The documentation of responses other than the ones declared for specific HTTP response codes. Use this field to cover undeclared responses. A Reference Object can link to a response that the OpenAPI Object's components/responses section defines.
         *
         * @see https://swagger.io/specification/#referenceObject Reference Object
         * @see https://swagger.io/specification/#componentsResponses OpenAPI Object's components/responses
         */
        $this->items["default"] = new Response();
        $this->items["default"]->description = "";
    }

    /**
     * Add PathItem to collection
     *
     * Any HTTP status code can be used as the property name, but only one property per code, to describe the expected response for that HTTP status code. A Reference Object can link to a response that is defined in the OpenAPI Object's components/responses section. This field MUST be enclosed in quotation marks (for example, "200") for compatibility between JSON and YAML. To define a range of response codes, this field MAY contain the uppercase wildcard character X. For example, 2XX represents all response codes between [200-299]. Only the following range definitions are allowed: 1XX, 2XX, 3XX, 4XX, and 5XX. If a response is defined using an explicit code, the explicit code definition takes precedence over the range definition for that code.
     *
     * @see https://swagger.io/specification/#referenceObject Reference Object
     * @see https://swagger.io/specification/#componentsResponses OpenAPI Object's components/responses
     *
     * @param string             $httpStatusCode A relative path to an individual endpoint. The field name MUST begin with a slash. The path is appended (no relative URL resolution) to the expanded URL from the Server Object's url field in order to construct the full URL. Path templating is allowed. When matching URLs, concrete (non-templated) paths would be matched before their templated counterparts. Templated paths with the same hierarchy but different templated names MUST NOT exist as they are identical. In case of ambiguous matching, it's up to the tooling to decide which one to use.
     * @param Response|Reference $pathItem       PathItem object
     *
     * @see https://swagger.io/specification/#serverObject Server Object
     * @see https://swagger.io/specification/#pathTemplating Path templating
     *
     * @return $this
     */
    public function add(String $httpStatusCode, $pathItem)
    {
        $this->items[$httpStatusCode] = $pathItem;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray($skipNull = true)
    {
        return $this->items;
    }
}
