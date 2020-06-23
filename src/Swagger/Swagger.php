<?php

namespace Genius257\OpenAPI_Generator\Swagger;

abstract class Swagger implements \JsonSerializable
{
    /**
     * Converts class to array
     *
     * @param boolean $skipNull skip null fields
     *
     * @return array
     */
    public function toArray($skipNull = true)
    {
        $reflectionClass = new \ReflectionClass($this);
        $properties = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
        $array = [];
        /** @var \ReflectionProperty $property */
        foreach ($properties as $property) {
            $value = $property->getValue($this);
            if ($value !== null) {
                $array[$property->getName()] = $value;
            } elseif (preg_match('/@required$/im', $property->getDocComment())) {
                throw new \Exception(sprintf('%s: required field "%s" omitted!', get_class($this), $property->getName()));
            }
        }

        return $array;
    }

    /**
     * Converts class to simple object
     *
     * @return object
     */
    public function jsonSerialize()
    {
        return (object) $this->toArray();
    }
}
