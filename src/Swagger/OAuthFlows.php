<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Allows configuration of the supported OAuth Flows.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class OAuthFlows extends Swagger
{
    /**
     * Configuration for the OAuth Implicit flow
     *
     * @var OAuthFlow
     */
    public $implicit;

    /**
     * Configuration for the OAuth Resource Owner Password flow
     *
     * @var OAuthFlow
     */
    public $password;

    /**
     * Configuration for the OAuth Client Credentials flow. Previously called application in OpenAPI 2.0.
     *
     * @var OAuthFlow
     */
    public $clientCredentials;

    /**
     * Configuration for the OAuth Authorization Code flow. Previously called accessCode in OpenAPI 2.0.
     *
     * @var OAuthFlow
     */
    public $authorizationCode;
}
