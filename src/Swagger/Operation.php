<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Describes a single API operation on a path.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Operation extends Swagger
{
    /**
     * A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.
     *
     * @var string[]
     */
    public $tags = [];

    /**
     * A short summary of what the operation does.
     *
     * @var string
     */
    public $summary;

    /**
     * A verbose explanation of the operation behavior. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * Additional external documentation for this operation.
     *
     * @var ExternalDocumentation
     */
    public $externalDocs;

    /**
     * Unique string used to identify the operation. The id MUST be unique among all operations described in the API. The operationId value is case-sensitive. Tools and libraries MAY use the operationId to uniquely identify an operation, therefore, it is RECOMMENDED to follow common programming naming conventions.
     *
     * @var string
     */
    public $operationId;

    /**
     * A list of parameters that are applicable for this operation. If a parameter is already defined at the Path Item, the new definition will override it but can never remove it. The list MUST NOT include duplicated parameters. A unique parameter is defined by a combination of a name and location. The list can use the Reference Object to link to parameters that are defined at the OpenAPI Object's components/parameters.
     *
     * @see https://swagger.io/specification/#pathItemParameters Path Item
     * @see https://swagger.io/specification/#parameterName name
     * @see https://swagger.io/specification/#parameterIn location
     * @see https://swagger.io/specification/#referenceObject Reference Object
     * @see https://swagger.io/specification/#componentsParameters OpenAPI Object's components/parameters
     *
     * @var Parameter[]|Reference[]
     */
    public $parameters = [];

    /**
     * The request body applicable for this operation. The requestBody is only supported in HTTP methods where the HTTP 1.1 specification RFC7231 has explicitly defined semantics for request bodies. In other cases where the HTTP spec is vague, requestBody SHALL be ignored by consumers.
     *
     * @see https://tools.ietf.org/html/rfc7231#section-4.3.1 RFC7231
     *
     * @var RequestBody|Reference
     */
    public $requestBody;

    /**
     * REQUIRED. The list of possible responses as they are returned from executing this operation.
     *
     * @required
     *
     * @var Responses
     */
    public $responses;

    /**
     * A map of possible out-of band callbacks related to the parent operation. The key is a unique identifier for the Callback Object. Each value in the map is a Callback Object that describes a request that may be initiated by the API provider and the expected responses. The key value used to identify the callback object is an expression, evaluated at runtime, that identifies a URL to use for the callback operation.
     *
     * @see https://swagger.io/specification/#callbackObject Callback Object
     *
     * @var Callback[]|Reference[]
     */
    public $callbacks = [];

    /**
     * Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation. Default value is false.
     *
     * @var bool
     */
    public $deprecated;

    /**
     * A declaration of which security mechanisms can be used for this operation. The list of values includes alternative security requirement objects that can be used. Only one of the security requirement objects need to be satisfied to authorize a request. This definition overrides any declared top-level security. To remove a top-level security declaration, an empty array can be used.
     *
     * @var SecurityRequirement[]
     */
    public $security = [];

    /**
     * An alternative server array to service this operation. If an alternative server object is specified at the Path Item Object or Root level, it will be overridden by this value.
     *
     * @var Server[]
     */
    public $servers = [];
}
