<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * An object representing a Server.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#serverObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Server extends Swagger
{
    /**
     * REQUIRED. A URL to the target host. This URL supports Server Variables and MAY be relative, to indicate that the host location is relative to the location where the OpenAPI document is being served. Variable substitutions will be made when a variable is named in {brackets}.
     *
     * @required
     *
     * @var string
     */
    public $url;

    /**
     * An optional string describing the host designated by the URL. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * A map between a variable name and its value. The value is used for substitution in the server's URL template.
     *
     * @var ServerVariable[] A map between a variable name and its value. The value is used for substitution in the server's URL template.
     */
    public $variables = [];
}
