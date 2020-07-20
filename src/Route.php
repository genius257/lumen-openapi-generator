<?php

namespace Genius257\OpenAPI_Generator;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationRuleParser;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\DocBlock;

class Route
{
    /**
     * Original route array object recived in __construct
     * @var array
     */
    private $route;

    /**
     * phpDocumentor DocBlock object
     * @var DocBlock
     */
    private $docBlock;

    /**
     * docblock factory instance
     * @var DocBlockFactory
     */
    private static $factory;

    /**
     * Create new Route class instance
     *
     * @param array $route Route information
     */
    public function __construct(array $route = [])
    {
        $this->route = $route;
        if (self::$factory === null) {
            self::$factory = DocBlockFactory::createInstance([
                'class' => Tags\Class_::class,
                'ref' => Tags\Ref::class,
                'response' => Tags\Response::class,
                'tag' => Tags\Tag::class,
            ]);
        }
        $this->docBlock = self::$factory->create($this->getDocComment());
    }

    /**
     * Get the route uri
     * @return string
     */
    public function getUri()
    {
        return $this->formatUri($this->route["uri"]);
    }

    /**
     * Get the route HTTP method, in lower-case.
     * @return string
     */
    public function getMethod()
    {
        return Str::lower($this->route["method"]);
    }

    /**
     * Get documentation information from the route.
     *
     * @return array
     */
    public function getDocumentation()
    {
        $documentation = $this->route["action"]["documentation"] ?? [];
        if (isset($documentation["responses"])&&is_subclass_of($documentation["responses"], Model::class)) {
            unset($documentation["responses"]);
        }
        if (isset($documentation["requestBody"])&&is_subclass_of($documentation["requestBody"], Model::class)) {
            unset($documentation["requestBody"]);
        }

        return $documentation;
    }

    /**
     * Returns route path parameter objects.
     * Intended for use by DocumentationUtil::arrayMergeParameterObjects
     *
     * @return array a route path parameter object collection
     */
    public function getRouteParameters()
    {
        $parameters = [];
        $matchCount = preg_match_all(
            "/{(\w+):((?![*+?])(?:[^\r\n\[\/\\\\]|\\\.|\\[(?:[^\\r\\n\]\\\\]|\\.)*\])+)}/", // https://stackoverflow.com/questions/17843691/javascript-regex-to-match-a-regex#answer-17843773
            $this->route["originalUri"],
            $parameters
        );
        $return = [];
        for ($i = 0; $i < $matchCount; $i++) {
            $return[] = [
                "name" => $parameters[1][$i],
                "description" => $parameters[2][$i],
                "in" => "path",
                "required" => !preg_match("/".$parameters[2][$i]."/", ""), //NOTE: if "required" is false, and "in" equals "path" then the swagger validator will report it as an error.
                "schema" => [
                    "type" => "string",
                    "pattern" => $parameters[2][$i], //NOTE: https://github.com/swagger-api/swagger-ui/issues/2103
                ],
            ];
        }

        return $return;

        $matchCount = preg_match_all("/\[?{(\w+)}\]?/", $this->getUri(), $parameters);

        return $parameters[1];
    }

    /**
     * Determine if the documented return of route is an Model class
     * @return boolean
     */
    public function isRequestModel()
    {
        $request = Arr::get($this->route, "action.documentation.requestBody", null);

        return $this->isModel($request);
    }

    /**
     * Determine if the documented response of route is an Model class
     * @return boolean
     */
    public function isResponseModel()
    {
        $response = Arr::get($this->route, "action.documentation.responses", null);

        return $this->isModel($response);
    }

    /**
     * Get the model category name from the model in the request documentation.
     *
     * @return string
     */
    public function getRequestModelCategory()
    {
        return $this->isRequestModel()?Arr::get($this->route, "action.documentation.requestBody")::make([])->getModelCategory():"";
    }

    /**
     * Get the model category name from the model in the response documentation.
     *
     * @return string
     */
    public function getResponseModelCategory()
    {
        return $this->isRequestModel()?Arr::get($this->route, "action.documentation.responses")::make([])->getModelCategory():"";
    }

    /**
     * Get the model parameters from the model in the request documentation.
     *
     * @return string
     */
    public function getRequestModelParameters()
    {

        if (!$this->isRequestModel()) {
            return (object) [];
        }
        $response = Arr::get($this->route, "action.documentation.requestBody", null);
        $rules = (new $response())->getModelRules();
        $rules = ((new ValidationRuleParser([]))->explode($rules))->rules;
        $rules = isset($rules["id"]) ? $rules : ["id" => "integer"] + $rules;

        return array_map(function ($value) {
            return [
                "type" => "mixed",
                "description" => is_array($value)?preg_replace("/^/m", "* ", implode($value, "\n")):$value,
            ];
        }, $rules);
    }

    /**
     * Get the model parameters from the model in the response documentation.
     *
     * @return string
     */
    public function getResponseModelParameters()
    {
        if (!$this->isResponseModel()) {
            return (object) [];
        }
        $response = Arr::get($this->route, "action.documentation.responses", null);
        $rules = (new $response())->getModelRules() ?? [];//TODO: could add warning (possibly only in verbose) descibing, that route has no modelRules
        $rules = ((new ValidationRuleParser([]))->explode($rules))->rules;
        $rules = isset($rules["id"]) ? $rules : ["id" => "integer"] + $rules;

        return array_map(function ($value) {
            return [
                "type" => "mixed",
                "description" => is_array($value)?preg_replace("/^/m", "* ", implode($value, "\n")):$value,
            ];
        }, $rules);
    }

    /**
     * Stringify the route middleware for usage in swagger comment field.
     * @return string
     */
    public function getMiddleware()
    {
        $middleware = Arr::get($this->route, "action.middleware", []);
        //print_r($middleware);
        //return $this->parseMiddleware(0, [], $middleware);
        return "\n***\n**middleware**\n".preg_replace("/^/m", "* ", implode("\n", $this->parseMiddleware(0, [], $middleware)));
    }

    /**
     * Parse middleware collection to elements.
     * Modified version of MiddlewareNameResolver::parseMiddlewareGroup.
     * @param  string $name             Currently not used, as the original code was used for middleware groups and this function accepts route middleware.
     * @param  array  $map              Currently not intended use. Original code intends this to be the route middleware.
     * @param  array  $middlewareGroups Route middleware to be parsed.
     *
     * @return array                    The middleware split into standardized array structures.
     *
     * @see https://github.com/laravel/framework/blob/5.5/src/Illuminate/Routing/MiddlewareNameResolver.php#L53 MiddlewareNameResolver::parseMiddlewareGroup
     */
    public function parseMiddleware($name, $map, $middlewareGroups)
    {
        $results = [];
        foreach ($middlewareGroups/*[$name]*/ as $middleware) {
            // If the middleware is another middleware group we will pull in the group and
            // merge its middleware into the results. This allows groups to conveniently
            // reference other groups without needing to repeat all their middlewares.
            if (isset($middlewareGroups[$middleware])) {
                $results = array_merge($results, $this->parseMiddleware(
                    $middleware,
                    $map,
                    $middlewareGroups
                ));
                continue;
            }

            list($middleware, $parameters) = array_pad(
                explode(':', $middleware, 2),
                2,
                null
            );

            // If this middleware is actually a route middleware, we will extract the full
            // class name out of the middleware list now. Then we'll add the parameters
            // back onto this class' name so the pipeline will properly extract them.
            if (isset($map[$middleware])) {
                $middleware = $map[$middleware];
            }
            $results[] = $middleware.($parameters ? ':'.$parameters : '');
        }

        return $results;
    }

    /**
     * Get closure of route
     *
     * @return \Closure
     */
    public function getClosure()
    {
        /*
           Parsed loosely from \Laravel\Lumen\Application@run() to ~callActionOnArrayBasedRoute
        */

        $action = $this->route['action'];

        if (isset($action['uses'])) {
            $uses = $action['uses'];

            if (is_string($uses) && ! Str::contains($uses, '@')) {
                $uses .= '@__invoke';
            }

            list($controller, $method) = explode('@', $uses);

            $reflection = new \ReflectionClass($controller);

            return $reflection->getMethod($method)->getClosure($reflection->newInstanceWithoutConstructor());
        }

        foreach ($action as $value) {
            if ($value instanceof \Closure) {
                $closure = $value;//->bindTo(new RouteingClosure());
                break;
            }
        }

        return $closure;
    }

    public function getDocComment()
    {
        $reflection = new \ReflectionFunction($this->getClosure());

        $docComment = $reflection->getDocComment();

        return $docComment === false ? "\/**\/" : $docComment;
    }

    public function getDocBlock()
    {
        return $this->docBlock;
    }

    /**
     * Get docBlock summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->docBlock->getSummary();
    }

    /**
     * Get docBlock description
     *
     * @return \phpDocumentor\Reflection\DocBlock\Description
     */
    public function getDescription()
    {
        return $this->docBlock->getDescription();
    }

    /**
     * Get annotations from route closure docBlock.
     *
     * @return string[]
     */
    public function getAnnotations()
    {
        return $this->parseAnnotations($this->getDocComment());
    }

    /**
     * Parse annotations in a docBlock.
     *
     * @param String $docBlock docBlock to parse.
     *
     * @see https://github.com/sebastianbergmann/phpunit/blob/d65a3e476302eb9e1f690eb9a08bddaa45404dd7/src/Util/Test.php#L580-L595
     *
     * @return string[]
     */
    public function parseAnnotations(String $docBlock)
    {
        $annotations = [];
        // Strip away the docblock header and footer to ease parsing of one line annotations
        $docBlock = (string) \substr($docBlock, 3, -2);
        if (\preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docBlock, $matches)) {
            $numMatches = \count($matches[0]);
            for ($i = 0; $i < $numMatches; ++$i) {
                $annotations[$matches['name'][$i]][] = (string) $matches['value'][$i];
            }
        }

        return $annotations;
    }

    /**
     * Determine if a given value is an Model class
     *
     * @param mixed $value Value to check
     *
     * @return boolean
     */
    protected function isModel($value)
    {
        return ($value !== null && is_subclass_of($value, Model::class));
    }

    /**
     * Formats a route URI.
     *
     * @param  string $uri The route URI.
     *
     * @return string      The URI after cleanup.
     */
    protected function formatUri(string $uri)
    {
        return preg_replace(
            "/\/{2,}/",
            "/",
            preg_replace(
                "/{(\w+):(?![*+?])(?:[^\r\n\[\/\\\\]|\\\.|\\[(?:[^\\r\\n\]\\\\]|\\.)*\])+}/",
                '/{$1}',
                $uri
            )."/"
        );
    }
}
