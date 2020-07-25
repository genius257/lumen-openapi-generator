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
