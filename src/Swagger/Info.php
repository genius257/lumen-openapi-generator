<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * The object provides metadata about the API. The metadata MAY be used by the clients if needed, and MAY be presented in editing or documentation generation tools for convenience.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#infoObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Info extends Swagger
{
    /**
     * REQUIRED. The title of the application.
     *
     * @required
     *
     * @var string
     */
    public $title;

    /**
     * A short description of the application. CommonMark syntax MAY be used for rich text representation.
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     *
     * @var string
     */
    public $description;

    /**
     * A URL to the Terms of Service for the API. MUST be in the format of a URL.
     *
     * @var string
     */
    public $termsOfService;

    /**
     * The contact information for the exposed API.
     *
     * @var Contact
     */
    public $contact;

    /**
     * The license information for the exposed API.
     *
     * @var License
     */
    public $license;

    /**
     * REQUIRED. The version of the OpenAPI document (which is distinct from the OpenAPI Specification version or the API implementation version).
     *
     * @see https://swagger.io/specification/#oasVersion OpenAPI Specification version
     *
     * @required
     *
     * @var string
     */
    public $version;
}
