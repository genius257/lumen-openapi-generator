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

        //TODO: better matching/verification for HTTP status code?

        $split = explode(' ', $body, 2);

        $httpStatusCode = $split[0];

        Assert::numeric($httpStatusCode);

        $body = $split[1];

        /**
         * NOTE: https://stackoverflow.com/a/32155765
         */
        $regexJSON = <<<'EOD'
        # Note that everything is atomic, JSON does not need backtracking if it's valid
        # and this prevents catastrophic backtracking
        (?<json>(?>\s*(?&object)\s*|\s*(?&array)\s*))
        (?<object>(?>\{\s*(?>(?&pair)(?>\s*,\s*(?&pair))*)?\s*\}))
        (?<pair>(?>(?&STRING)\s*:\s*(?&value)))
        (?<array>(?>\[\s*(?>(?&value)(?>\s*,\s*(?&value))*)?\s*\]))
        (?<value>(?>true|false|null|(?&STRING)|(?&NUMBER)|(?&object)|(?&array)))
        (?<STRING>(?>"(?>\\(?>["\\\/bfnrt]|u[a-fA-F0-9]{4})|[^"\\\0-\x1F\x7F]+)*"))
        (?<NUMBER>(?>-?(?>0|[1-9][0-9]*)(?>\.[0-9]+)?(?>[eE][+-]?[0-9]+)?))
        EOD;

        $regexSubTag = <<<'EOD'
        # NOTE: original regex taken from \phpDocumentor\Reflection\DocBlock\DescriptionFactory and modified slightly to custom use.
        (?<inlineTag>\{
            # "{@}" is not a valid inline tag. This ensures that we do not treat it as one, but treat it literally.
            (?!@\})
            # We want to capture the whole tag line, but without the inline tag delimiters.
            (?:\@
                # Match everything up to the next delimiter.
                [^{}]*
                # Nested inline tag content should not be captured, or it will appear in the result separately.
                (?:
                    # Match nested inline tags.
                    (?:
                        # Because we did not catch the tag delimiters earlier, we must be explicit with them here.
                        # Notice that this also matches "{}", as a way to later introduce it as an escape sequence.
                        \{(?1)?\}
                        |
                        # Make sure we match hanging "{".
                        \{
                    )
                    # Match content after the nested inline tag.
                    [^{}]*
                )* # If there are more inline tags, match them as well. We use "*" since there may not be any
                   # nested inline tags.
            )
        \})
        EOD;

        $regex = <<<EOD
        /(?(DEFINE)
        $regexJSON
        $regexSubTag
        )
        ^\s*((?&json)|(?&inlineTag))/Sux
        EOD;

        $parts = preg_split($regex, $body, 0, PREG_SPLIT_DELIM_CAPTURE+PREG_SPLIT_NO_EMPTY);

        Assert::isArray($parts);
        Assert::count($parts, 2);//TODO: maybe should require atlest 1, max 2

        $status = $httpStatusCode;
        //$type = $parts[0];
        $type = $descriptionFactory->create($parts[0], $context);
        $description = $description = $descriptionFactory->create($parts[1] ?? '', $context);

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
