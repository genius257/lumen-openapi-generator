<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Configuration details for a supported OAuth Flow
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class OAuthFlow extends Swagger
{
    /**
     * REQUIRED. The authorization URL to be used for this flow. This MUST be in the form of a URL.
     *
     * @var string Applies To: oauth2 ("implicit", "authorizationCode")
     */
    public $authorizationUrl;

    /**
     * REQUIRED. The token URL to be used for this flow. This MUST be in the form of a URL.
     *
     * @var string Applies To: oauth2 ("password", "clientCredentials", "authorizationCode")
     */
    public $tokenUrl;

    /**
     * The URL to be used for obtaining refresh tokens. This MUST be in the form of a URL.
     *
     * @var string Applies To: oauth2
     */
    public $refreshUrl;

    /**
     * REQUIRED. The available scopes for the OAuth2 security scheme. A map between the scope name and a short description for it.
     *
     * @var string[] Map[string, string], Applies To: oauth2
     */
    public $scopes;
}
