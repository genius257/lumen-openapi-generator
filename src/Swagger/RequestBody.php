<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Describes a single request body.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class RequestBody extends Swagger
{
    /**
     * A brief description of the request body. This could contain examples of use. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * REQUIRED. The content of the request body. The key is a media type or media type range and the value describes it. For requests that match multiple keys, only the most specific key is applicable. e.g. text/plain overrides text/*
     *
     * @see https://tools.ietf.org/html/rfc7231#appendix-D media type range
     *
     * @required
     *
     * @var MediaType[] Map[string, Media Type Object]
     */
    public $content;

    /**
     * Determines if the request body is required in the request. Defaults to false.
     *
     * @var bool
     */
    public $required;
}
