<?php

namespace Genius257\OpenAPI_Generator\Swagger;

/**
 * Holds a set of reusable objects for different aspects of the OAS. All objects defined within the components object will have no effect on the API unless they are explicitly referenced from properties outside the components object.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @see https://swagger.io/specification/#componentsObject
 * @see https://swagger.io/specification/#specificationExtensions Specification Extensions
 */
class Components extends Swagger
{
    /**
     * An object to hold reusable Schema Objects.
     *
     * @see https://swagger.io/specification/#schemaObject Schema Objects
     *
     * @var Response[]|Reference[]
     */
    public $schemas = [];

    /**
     * An object to hold reusable Response Objects.
     *
     * @see https://swagger.io/specification/#responseObject Response Objects
     *
     * @var Response[]|Reference[]
     */
    public $responses = [];

    /**
     * An object to hold reusable Parameter Objects.
     *
     * @see https://swagger.io/specification/#parameterObject Parameter Objects
     *
     * @var Parameter[]|Reference[]
     */
    public $parameters = [];

    /**
     * An object to hold reusable Example Objects.
     *
     * @see https://swagger.io/specification/#exampleObject Example Objects
     *
     * @var Example[]|Reference[]
     */
    public $examples = [];

    /**
     * An object to hold reusable Request Body Objects.
     *
     * @see https://swagger.io/specification/#requestBodyObject Request Body Objects
     *
     * @var RequestBody[]|Reference[]
     */
    public $requestBodies = [];

    /**
     * An object to hold reusable Header Objects.
     *
     * @see https://swagger.io/specification/#headerObject Header Objects
     *
     * @var Header[]|Reference[]
     */
    public $headers = [];

    /**
     * An object to hold reusable Security Scheme Objects.
     *
     * @see https://swagger.io/specification/#securitySchemeObject Security Scheme Objects
     *
     * @var SecurityScheme[]|Reference[]
     */
    public $securitySchemes = [];

    /**
     * An object to hold reusable Link Objects.
     *
     * @see https://swagger.io/specification/#linkObject Link Objects
     *
     * @var Link[]|Reference[]
     */
    public $links = [];

    /**
     * An object to hold reusable Callback Objects.
     *
     * @see https://swagger.io/specification/#callbackObject Callback Objects
     *
     * @var Callback[]|Reference[]
     */
    public $callbacks = [];
}
