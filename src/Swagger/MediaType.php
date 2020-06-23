<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Each Media Type Object provides schema and examples for the media type identified by its key.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class MediaType extends Swagger
{
    /**
     * The schema defining the content of the request, response, or parameter.
     *
     * @var Schema|Reference
     */
    public $schema;

    /**
     * Example of the media type. The example object SHOULD be in the correct format as specified by the media type. The example field is mutually exclusive of the examples field. Furthermore, if referencing a schema which contains an example, the example value SHALL override the example provided by the schema.
     *
     * @var mixed
     */
    public $example;

    /**
     * Examples of the media type. Each example object SHOULD match the media type and specified schema if present. The examples field is mutually exclusive of the example field. Furthermore, if referencing a schema which contains an example, the examples value SHALL override the example provided by the schema.
     *
     * @var Example[]|Reference[] Map[ string, Example Object | Reference Object]
     */
    public $examples;

    /**
     * A map between a property name and its encoding information. The key, being the property name, MUST exist in the schema as a property. The encoding object SHALL only apply to requestBody objects when the media type is multipart or application/x-www-form-urlencoded.
     *
     * @var Encoding[] Map[string, Encoding Object]
     */
    public $encoding;
}
