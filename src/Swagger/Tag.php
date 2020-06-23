<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Adds metadata to a single tag that is used by the Operation Object. It is not mandatory to have a Tag Object per tag defined in the Operation Object instances.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#operationObject Operation Object
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Tag extends Swagger
{
    /**
     * REQUIRED. The name of the tag.
     *
     * @required
     *
     * @var string
     */
    public $name;

    /**
     * A short description for the tag. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * Additional external documentation for this tag.
     *
     * @var ExternalDocumentation
     */
    public $externalDocs;
}
