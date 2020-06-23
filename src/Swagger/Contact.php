<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Contact information for the exposed API.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#contactObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */

class Contact extends Swagger
{
    /**
     * The identifying name of the contact person/organization.
     *
     * @var string
     */
    public $name;

    /**
     * The URL pointing to the contact information. MUST be in the format of a URL.
     *
     * @var string
     */
    public $url;

    /**
     * The email address of the contact person/organization. MUST be in the format of an email address.
     *
     * @var string
     */
    public $email;
}
