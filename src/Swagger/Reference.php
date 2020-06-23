<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * A simple object to allow referencing other components in the specification, internally and externally.
 *
 * The Reference Object is defined by JSON Reference and follows the same structure, behavior and rules.
 *
 * For this specification, reference resolution is accomplished as defined by the JSON Reference specification and not by the JSON Schema specification.
 *
 * This object cannot be extended with additional properties and any properties added SHALL be ignored.
 */
class Reference extends Swagger
{
    /**
     * @required
     *
     * @var string
     */
    public $ref;

    /**
     * @inheritdoc
     */
    public function toArray($skipNull = true)
    {
        $arr = parent::toArray();
        $arr['$ref'] = $arr['ref'];
        unset($arr['ref']);

        return $arr;
    }
}
