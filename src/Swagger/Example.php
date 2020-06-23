<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Example extends Swagger
{
    /**
     * Short description for the example.
     *
     * @var string
     */
    public $summary;

    /**
     * Long description for the example. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * Embedded literal example. The value field and externalValue field are mutually exclusive. To represent examples of media types that cannot naturally represented in JSON or YAML, use a string value to contain the example, escaping where necessary.
     *
     * @var mixed
     */
    public $value;

    /**
     * A URL that points to the literal example. This provides the capability to reference examples that cannot easily be included in JSON or YAML documents. The value field and externalValue field are mutually exclusive.
     *
     * @var string
     */
    public $externalValue;
}
