<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Holds the relative paths to the individual endpoints and their operations. The path is appended to the URL from the Server Object in order to construct the full URL. The Paths MAY be empty, due to ACL constraints.
 *
 * @see https://swagger.io/specification/#pathsObject
 * @see https://swagger.io/specification/#serverObject Server Object
 * @see https://swagger.io/specification/#securityFiltering ACL constraints
 */
class Paths extends Swagger
{
    /**
     * @var PathItem[]
     */
    protected $items = [];

    /**
     * Add PathItem to collection
     *
     * @param string   $fieldPattern A relative path to an individual endpoint. The field name MUST begin with a slash. The path is appended (no relative URL resolution) to the expanded URL from the Server Object's url field in order to construct the full URL. Path templating is allowed. When matching URLs, concrete (non-templated) paths would be matched before their templated counterparts. Templated paths with the same hierarchy but different templated names MUST NOT exist as they are identical. In case of ambiguous matching, it's up to the tooling to decide which one to use.
     * @param PathItem $pathItem     PathItem object
     *
     * @see https://swagger.io/specification/#serverObject Server Object
     * @see https://swagger.io/specification/#pathTemplating Path templating
     *
     * @return $this
     */
    public function add(String $fieldPattern, PathItem $pathItem)
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
