<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#schemaObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Schema extends Swagger
{
    /** @var string */
    public $title;

    /**
     * The value of "multipleOf" MUST be a number, strictly greater than 0.
     *
     * A numeric instance is valid only if division by this keyword's value results in an integer.
     *
     * @var int
     */
    public $multipleOf;

    /**
     * The value of "maximum" MUST be a number, representing an inclusive upper limit for a numeric instance.
     *
     * If the instance is a number, then this keyword validates only if the instance is less than or exactly equal to "maximum".
     *
     * @var int
     */
    public $maximum;

    /**
     * The value of "exclusiveMaximum" MUST be number, representing an exclusive upper limit for a numeric instance.
     *
     * If the instance is a number, then the instance is valid only if it has a value strictly less than (not equal to) "exclusiveMaximum".
     * 
     * @var int
     */
    public $exclusiveMaximum;

    /**
     * The value of "minimum" MUST be a number, representing an inclusive lower limit for a numeric instance.
     *
     * If the instance is a number, then this keyword validates only if the instance is greater than or exactly equal to "minimum".
     *
     * @var int
     */
    public $minimum;

    /**
     * The value of "exclusiveMinimum" MUST be number, representing an exclusive lower limit for a numeric instance.
     *
     * If the instance is a number, then the instance is valid only if it has a value strictly greater than (not equal to) "exclusiveMinimum".
     *
     * @var int
     */
    public $exclusiveMinimum;

    /**
     * The value of this keyword MUST be a non-negative integer.
     *
     * A string instance is valid against this keyword if its length is less than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its characters as defined by RFC 8259 [RFC8259].
     *
     * @var int
     */
    public $maxLength;

    /**
     * The value of this keyword MUST be a non-negative integer.
     *
     * A string instance is valid against this keyword if its length is greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its characters as defined by RFC 8259 [RFC8259].
     *
     * Omitting this keyword has the same behavior as a value of 0.
     *
     * @var int
     */
    public $minLength;

    /**
     * This string SHOULD be a valid regular expression, according to the ECMA 262 regular expression dialect.
     *
     * @var string
     */
    public $pattern;

    public $maxItems;

    public $minItems;

    public $uniqueItems;

    public $maxProperties;

    public $minProperties;

    public $required;

    public $enum;

    /**
     * Value MUST be a string. Multiple types via an array are not supported.
     *
     * @var string
     */
    public $type = "string";

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     *
     * @var Schema
     */
    public $allOf;

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     *
     * @var Schema
     */
    public $oneOf;

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     *
     * @var Schema
     */
    public $anyOf;

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     *
     * @var Schema
     */
    public $not;

    /**
     * Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. items MUST be present if the type is array.
     *
     * @var object
     */
    public $items;

    /**
     * Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).
     *
     * @var Schema[]
     */
    public $properties;

    /**
     * Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema. Consistent with JSON Schema, additionalProperties defaults to true.
     *
     * @var bool|object
     */
    public $additionalProperties;

    /**
     * CommonMark syntax MAY be used for rich text representation.
     *
     * @var string
     *
     * @see http://spec.commonmark.org/ CommonMark syntax
     */
    public $description;

    /**
     * See Data Type Formats for further details. While relying on JSON Schema's defined formats, the OAS offers a few additional predefined formats.
     */
    public $format;

    /**
     * The default value represents what would be assumed by the consumer of the input as the value of the schema if one is not provided. Unlike JSON Schema, the value MUST conform to the defined type for the Schema Object defined at the same level. For example, if type is string, then default can be "foo" but cannot be 1.
     */
    public $default;



    /**
     * Allows sending a null value for the defined schema. Default value is false.
     *
     * @var bool
     */
    public $nullable;

    /**
     * Adds support for polymorphism. The discriminator is an object name that is used to differentiate between other schemas which may satisfy the payload description. See Composition and Inheritance for more details.
     *
     * @var Discriminator
     */
    public $discriminator;

    /**
     * Relevant only for Schema "properties" definitions. Declares the property as "read only". This means that it MAY be sent as part of a response but SHOULD NOT be sent as part of the request. If the property is marked as readOnly being true and is in the required list, the required will take effect on the response only. A property MUST NOT be marked as both readOnly and writeOnly being true. Default value is false.
     *
     * @var bool
     */
    public $readOnly;

    /**
     * Relevant only for Schema "properties" definitions. Declares the property as "write only". Therefore, it MAY be sent as part of a request but SHOULD NOT be sent as part of the response. If the property is marked as writeOnly being true and is in the required list, the required will take effect on the request only. A property MUST NOT be marked as both readOnly and writeOnly being true. Default value is false.
     *
     * @var bool
     */
    public $writeOnly;

    /**
     * This MAY be used only on properties schemas. It has no effect on root schemas. Adds additional metadata to describe the XML representation of this property.
     *
     * @var XML
     */
    public $xml;

    /**
     * Additional external documentation for this schema.
     *
     * @var ExternalDocumentation $externalDocs;
     */
    public $externalDocs;

    /**
     * A free-form property to include an example of an instance for this schema. To represent examples that cannot be naturally represented in JSON or YAML, a string value can be used to contain the example with escaping where necessary.
     *
     * @var mixed
     */
    public $example;

    /**
     * Specifies that a schema is deprecated and SHOULD be transitioned out of usage. Default value is false.
     *
     * @var bool
     */
    public $deprecated;
}
