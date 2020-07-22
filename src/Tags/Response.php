<?php
namespace Genius257\OpenAPI_Generator\Tags;

use Genius257\OpenAPI_Generator\Swagger\Response as SwaggerResponse;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\StaticMethod;
use phpDocumentor\Reflection\Types\Context;
use Webmozart\Assert\Assert;
use JsonSerializable;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Type;

class Response extends BaseTag implements StaticMethod, JsonSerializable
{
    protected $name = "response";
    protected $status;

    /** @var Type */
    private $type;

    public function __construct(String $status, $type, Description $description)
    {
        $this->status = $status;
        $this->description = $description;
        $this->type = $type;
    }

    public static function create($body, TypeResolver $typeResolver = null, DescriptionFactory $descriptionFactory = null, Context $context = null): Response
    {
        Assert::notNull($descriptionFactory);

        $parts = preg_split('/\s+/Su', $body, 3);

        $status = $parts[0] ?? '';
        $type = $descriptionFactory->create($parts[1] ?? '', $context);
        if (count($type->getTags()) === 0) {
            $type = $typeResolver->resolve($parts[1] ?? '', $context);
        }
        $description = $descriptionFactory->create($parts[2] ?? '', $context);

        return new static($status, $type, $description);
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
        $response = new SwaggerResponse();
        $response->description = $this->description->render();
        return $response;
        return $this->__toString();
    }

    public function getStatus()
    {
        return $this->status;
    }
}
