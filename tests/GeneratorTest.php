<?php

use Genius257\OpenAPI_Generator\Generator;
use Laravel\Lumen\Application;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase {
    public function testGenerator() {
        $app = new Application();
        $app->router->get(
            '/',
            /**
             * example router summary here.
             * example router description here.
             * @tag tag01
             * @tag tag02
             * @response 200 {@class \Illuminate\Database\Eloquent\Model} this is a test
             * @response 404 {
             *  "message": "No query results for model"
             * } a 404 case
             * @response 200 invalid response tag. Will be omitted from result.
             * @class 123
             */
            function () {
                //
            }
        );
        $openAPI = Generator::Generate($app->router);
        //var_dump($openAPI);
        var_dump(json_encode($openAPI));
    }
}
