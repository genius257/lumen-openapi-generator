<?php

namespace Genius257\OpenAPI_Generator\Swagger;

class SecurityRequirement extends Swagger
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * Add Security requirement
     *
     * Each name MUST correspond to a security scheme which is declared in the Security Schemes under the Components Object. If the security scheme is of type "oauth2" or "openIdConnect", then the value is a list of scope names required for the execution. For other security scheme types, the array MUST be empty.
     *
     * @param string   $name       Each name MUST correspond to a security scheme which is declared in the Security Schemes under the Components Object.
     * @param string[] $scopeNames PathItem object If the security scheme is of type "oauth2" or "openIdConnect", then the value is a list of scope names required for the execution. For other security scheme types, the array MUST be empty.
     *
     * @see https://swagger.io/specification/#serverObject Server Object
     * @see https://swagger.io/specification/#pathTemplating Path templating
     *
     * @return $this
     */
    public function add(String $name, array $scopeNames = [])
    {
        $this->items[$fieldPattern] = $pathItem;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray($skipNull = true)
    {
        return $this->items;
    }
}
