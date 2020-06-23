<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * A single encoding definition applied to a single schema property.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Encoding extends Swagger
{
    /**
     * The Content-Type for encoding a specific property. Default value depends on the property type: for string with format being binary â€“ application/octet-stream; for other primitive types â€“ text/plain; for object - application/json; for array â€“ the default is defined based on the inner type. The value can be a specific media type (e.g. application/json), a wildcard media type (e.g. image/*), or a comma-separated list of the two types.
     *
     * @var string
     */
    public $contentType;

    /**
     * A map allowing additional information to be provided as headers, for example Content-Disposition. Content-Type is described separately and SHALL be ignored in this section. This property SHALL be ignored if the request body media type is not a multipart.
     *
     * @var Header[]|Reference[] Map[string, Header Object | Reference Object]
     */
    public $headers;

    /**
     * Describes how a specific property value will be serialized depending on its type. See Parameter Object for details on the style property. The behavior follows the same values as query parameters, including default values. This property SHALL be ignored if the request body media type is not application/x-www-form-urlencoded.
     *
     * @see https://swagger.io/specification/#parameterObject Parameter Object
     * @see https://swagger.io/specification/#parameterStyle style
     *
     * @var string
     */
    public $style;

    /**
     * When this is true, property values of type array or object generate separate parameters for each value of the array, or key-value-pair of the map. For other types of properties this property has no effect. When style is form, the default value is true. For all other styles, the default value is false. This property SHALL be ignored if the request body media type is not application/x-www-form-urlencoded.
     *
     * @see https://swagger.io/specification/#encodingStyle style
     *
     * @var bool
     */
    public $explode;

    /**
     * Determines whether the parameter value SHOULD allow reserved characters, as defined by RFC3986 :/?#[]@!$&'()*+,;= to be included without percent-encoding. The default value is false. This property SHALL be ignored if the request body media type is not application/x-www-form-urlencoded.
     *
     * @see https://tools.ietf.org/html/rfc3986#section-2.2 RFC3986
     *
     * @var bool
     */
    public $allowReserved;
}
