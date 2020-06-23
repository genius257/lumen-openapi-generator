<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * License information for the exposed API.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#licenseObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */

class License extends Swagger
{
    /**
     * REQUIRED. The license name used for the API.
     *
     * @required
     *
     * @var string
     */
    public $name;

    /**
     * A URL to the license used for the API. MUST be in the format of a URL.
     *
     * @var string
     */
    public $url;
}
