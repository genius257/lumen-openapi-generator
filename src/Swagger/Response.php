<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Describes a single response from an API Operation, including design-time, static links to operations based on the response.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Response extends Swagger
{
    /**
     * REQUIRED. A short description of the response. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @required
     *
     * @var string
     */
    public $description;

    /**
     * Maps a header name to its definition. RFC7230 states header names are case insensitive. If a response header is defined with the name "Content-Type", it SHALL be ignored.
     *
     * @see https://tools.ietf.org/html/rfc7230#page-22 RFC7230
     *
     * @var Header[]|Reference[] Map[string, Header Object | Reference Object]
     */
    public $headers;

    /**
     * A map containing descriptions of potential response payloads. The key is a media type or media type range and the value describes it. For responses that match multiple keys, only the most specific key is applicable. e.g. text/plain overrides text/*
     *
     * @see https://tools.ietf.org/html/rfc7231#appendix-D media type range
     *
     * @var MediaType[] Map[string, Media Type Object]
     */
    public $content;

    /**
     * A map of operations links that can be followed from the response. The key of the map is a short name for the link, following the naming constraints of the names for Component Objects.
     *
     * @see https://swagger.io/specification/#componentsObject Component Objects
     *
     * @var Link[]|Reference[] Map[string, Link Object | Reference Object]
     */
    public $links;
}
