<?php

namespace Genius257\OpenAPI_Generator;

use Genius257\OpenAPI_Generator\Swagger\Parameter;
use Genius257\OpenAPI_Generator\Swagger\Schema;


class Annotations
{
    public static function parse($annotations)
    {
        $instance = new self();
        $result = [];
        foreach ($annotations as $annotation => $annotationCollection) {
            foreach ($annotationCollection as $value) {
                $method = 'parse'.ucfirst($annotation);
                if (method_exists($instance, $method)) {
                    $result[] = $instance->$method($value);
                } else {
                    //Log here, if verbose
                }
            }
        }

        return $result;
    }

    protected function parseGroup($annotation)
    {
        return $annotation;
    }

    protected function parseTag($annotaion)
    {
        return $annotaion;
    }

    protected function parsePathParam($annotaion)
    {
        $matches = [];
        $matched = preg_match('/^(?P<name>[a-zA-Z0-9]+)[ \t]+(?:(?P<type>[a-zA-Z_]+(?:\[\])?))(?P<optional>[ \t]+optional)?(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/', $annotaion, $matches);

        if (!$matched) {
            throw new \Exception(sprintf('path parameter annotation coult not be parsed: %s', $annotaion));
        }

        $parameter = new Parameter();
        //$parameter->example = "xyz";
        $parameter->in = "path";
        $parameter->name = $matches['name'];
        $parameter->description = $matches['value'] ?? null;
        $parameter->required = !(isset($matches['optional']) && strlen($matches['optional']));
        $parameter->schema = new Schema();
        $parameter->schema->type = $matches['type'];

        return $parameter;
    }

    protected function parseQueryParam($annotaion)
    {
        $matches = [];
        $matched = preg_match('/^(?P<name>[a-zA-Z0-9.]+)[ \t]+(?P<type>[a-zA-Z_]+(?:\[\])?)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/', $annotaion, $matches);

        if (!$matched) {
            throw new \Exception(sprintf('query parameter annotation coult not be parsed: %s', $annotaion));
        }

        $parameter = new Parameter();
        $parameter->in = "query";
        $parameter->name = $matches['name'];
        $parameter->description = $matches['value'] ?? null;
        $parameter->schema = new Schema();
        $parameter->schema->type = $matches['type'];

        return $parameter;
    }
/*
    protected function parseBodyparam($annotaion)
    {
        $matches = [];
        $matched = preg_match('^/(?P<name>[a-zA-Z0-9]+)(?:[ \t]+(?P<value>.*?))[ \t]*\r?$/', $annotaion, $matches);

        if (!$matched) {
            throw \Exception(sprintf('path parameter annotation coult not be parsed: %s', $annotaion));
        }

        $schema = new Schema();
        $schema->type = "string";
        $parameter->name = $matches['name'];

        return $parameter;
    }
*/
/*
    protected function parseResponse($annotaion)
    {
        return $annotaion;
    }
*/
}
