<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Describes a single operation parameter.
 *
 * A unique parameter is defined by a combination of a name and location.
 * Parameter Locations
 * There are four possible parameter locations specified by the in field:
 *  * path - Used together with Path Templating, where the parameter value is actually part of the operation's URL. This does not include the host or base path of the API. For example, in /items/{itemId}, the path parameter is itemId.
 *  * query - Parameters that are appended to the URL. For example, in /items?id=###, the query parameter is id.
 *  * header - Custom headers that are expected as part of the request. Note that RFC7230 states header names are case insensitive.
 *  * cookie - Used to pass a specific cookie value to the API.
 */
class Parameter extends Swagger
{
    /**
     * REQUIRED. The name of the parameter. Parameter names are case sensitive.
     *
     * * If in is "path", the name field MUST correspond to the associated path segment from the path field in the Paths Object. See Path Templating for further information.
     * * If in is "header" and the name field is "Accept", "Content-Type" or "Authorization", the parameter definition SHALL be ignored.
     * * For all other cases, the name corresponds to the parameter name used by the in property.
     *
     * @see https://swagger.io/specification/#parameterIn in
     * @see https://swagger.io/specification/#pathsPath path
     * @see https://swagger.io/specification/#pathsObject Paths Object
     * @see https://swagger.io/specification/#pathTemplating Path Templating
     *
     * @required
     *
     * @var string
     */
    public $name;

    /**
     * REQUIRED. The location of the parameter. Possible values are "query", "header", "path" or "cookie".
     *
     * @required
     *
     * @var string
     */
    public $in;

    /**
     * A brief description of the parameter. This could contain examples of use. CommonMark syntax MAY be used for rich text representation.
     *
     * @var string
     */
    public $description;

    /**
     * Determines whether this parameter is mandatory. If the parameter location is "path", this property is REQUIRED and its value MUST be true. Otherwise, the property MAY be included and its default value is false.
     *
     * @see https://swagger.io/specification/#parameterIn parameter location
     *
     * @var bool
     */
    public $required;

    /**
     * Specifies that a parameter is deprecated and SHOULD be transitioned out of usage. Default value is false.
     *
     * @var bool
     */
    public $deprecated;

    /**
     * Sets the ability to pass empty-valued parameters. This is valid only for query parameters and allows sending a parameter with an empty value. Default value is false. If style is used, and if behavior is n/a (cannot be serialized), the value of allowEmptyValue SHALL be ignored. Use of this property is NOT RECOMMENDED, as it is likely to be removed in a later revision.
     *
     * @see https://swagger.io/specification/#parameterStyle style
     *
     * @var bool
     */
    public $allowEmptyValue;

    /**
     * @var string
     */
    public $style;

    /**
     * @var bool
     */
    public $explode;

    /**
     * @var bool
     */
    public $allowReserved;

    /**
     * @var Schema|Reference
     */
    public $schema;

    /**
     * @var mixed
     */
    public $example;

    /**
     * @var Example[]|Reference[] Map[ string, Example Object | Reference Object]
     */
    public $examples;

    /**
     * @var MediaType[] Map[string, Media Type Object]
     */
    public $content;
}
