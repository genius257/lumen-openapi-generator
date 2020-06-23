<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * The Header Object follows the structure of the Parameter Object with the following changes:
 *
 * All traits that are affected by the location MUST be applicable to a location of header (for example, style).
 *
 * @see https://swagger.io/specification/#parameterStyle style
 */
class Header extends Parameter
{
    /**
     * name MUST NOT be specified, it is given in the corresponding headers map
     *
     * @inheritdoc
     */
    private $name;

    /**
     * in MUST NOT be specified, it is implicitly in header.
     *
     * @inheritdoc
     */
    private $in;
}
