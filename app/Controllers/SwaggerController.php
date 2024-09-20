<?php

namespace App\Controllers;

use OpenApi\Generator;
use OpenApi\Annotations as OA;

class SwaggerController extends BaseController
{
    /**
     * @OA\Info(
     *     version="1.0.0",
     *     title="API Documentation for Planificala",
     *     description="API endpoints for user management in the Planificala system",
     *     @OA\Contact(
     *         email="soporte@planificala.cl"
     *     )
     * )
     *
     * @OA\PathItem(
     *     path="/api"
     * )
     *
     * @OA\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer",
     *     bearerFormat="JWT"
     * )
     */
    public function documentation()
    {
        // Scan the Api controllers folder for annotations
        $openapi = Generator::scan([APPPATH . 'Controllers/Api']);
        header('Content-Type: application/json');
        echo $openapi->toJson();
    }
}
