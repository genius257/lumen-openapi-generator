<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * An object representing a Server Variable for server URL template substitution.
 *
 * An object representing a Server Variable for server URL template substitution.
 *
 * @see https://swagger.io/specification/#serverVariableObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class ServerVariable extends Swagger
{
    /**
     * An enumeration of string values to be used if the substitution options are from a limited set.
     *
     * @var string[]
     */
    public $enum;

    /**
     * REQUIRED. The default value to use for substitution, which SHALL be sent if an alternate value is not supplied. Note this behavior is different than the Schema Object's treatment of default values, because in those cases parameter values are optional.
     *
     * @see https://swagger.io/specification/#schemaObject Schema Object
     *
     * @required
     *
     * @var string
     */
    public $default;

    /**
     * An optional description for the server variable. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;
}
