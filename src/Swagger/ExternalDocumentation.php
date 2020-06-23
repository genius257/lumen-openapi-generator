<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class ExternalDocumentation extends Swagger
{
    /**
     * A short description of the target documentation. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * REQUIRED. The URL for the target documentation. Value MUST be in the format of a URL.
     *
     * @required
     *
     * @var string
     */
    public $url;
}
