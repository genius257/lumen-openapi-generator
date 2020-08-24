<?php

namespace Genius257\OpenAPI_Generator;

use Genius257\OpenAPI_Generator\Swagger\Operation;
use Genius257\OpenAPI_Generator\Swagger\Parameter;
use Genius257\OpenAPI_Generator\Swagger\PathItem;
use Genius257\OpenAPI_Generator\Swagger\Responses;
use Laravel\Lumen\Routing\Router;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;

class Generator {
    /**
     * Generate OpenAPI swagger documentation based on lumen router
     * 
     * @param \Laravel\Lumen\Routing\Router $router
     */
    public static function Generate(Router $router) {
        $openAPI = new \Genius257\OpenAPI_Generator\Swagger\OpenAPI();
        $openAPI->paths = new \Genius257\OpenAPI_Generator\Swagger\Paths();

        $pathItems = [];

        foreach ($router->getRoutes() as $key => $value) {
            $route = new Route($value);
            $uri = $route->getUri();
            $method = $route->getMethod();
            $annotations = Annotations::parse($route->getAnnotations());
            if (!array_key_exists($uri, $pathItems)) {
                $pathItems[$uri] = new PathItem();
                $openAPI->paths->add($uri, $pathItems[$uri]);
            }
            $pathItem = $pathItems[$uri];

            $pathItem->$method = new Operation();
            $pathItem->$method->description = $route->getDescription()->render();
            $pathItem->$method->summary = $route->getSummary();
            $pathItem->$method->tags = $route->getDocBlock()->getTagsByName('tag');
            $responses = new Responses();

            //var_dump(array_map(function($tag) {return get_class($tag);}, $route->getDocBlock()->getTagsByName('class')));

            foreach ($route->getDocBlock()->getTagsByName('response') as $response) {
                /** @var \Genius257\OpenAPI_Generator\Tags\Response $response */
                //var_dump($response->getStatus(), $response->toSwagger());
                if ($response instanceof \Genius257\OpenAPI_Generator\Tags\Response) {
                    $responses->add(
                        (string) $response->getStatus(),
                        $response
                    );
                } else {
                    // TODO: here we handle invalid tags and unexspected classes from the phpDocumentor Reflection DocBlock logic.
                }
            }
            $pathItem->$method->responses = $responses;
            foreach ($annotations as $object) {
                if ($object instanceof Parameter) {
                    $pathItem->$method->parameters[] = $object;
                }
            }
        }

        return $openAPI;
    }
}
