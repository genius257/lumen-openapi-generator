<?php
namespace Genius257\OpenAPI_Generator\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\StaticMethod;
use phpDocumentor\Reflection\Types\Context;
use Webmozart\Assert\Assert;
use JsonSerializable;

class Ref extends BaseTag implements StaticMethod, JsonSerializable
{
    protected $name = "tag";

    public function __construct(Description $description)
    {
        $this->description = $description;
    }

    public static function create($body, DescriptionFactory $descriptionFactory = null, Context $context = null): Ref
    {
        Assert::notNull($descriptionFactory);

        return new static($descriptionFactory->create($body, $context));
    }

    public function __toString(): string
    {
        return (string) $this->description;
    }

    /**
     * Converts class to simple object
     *
     * @return object
     */
    public function jsonSerialize()
    {
        return $this->__toString();
    }
}
