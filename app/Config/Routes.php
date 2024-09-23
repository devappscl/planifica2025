<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'HomeController::index');


 $routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {

    // Rutas para UserController (ya definidas)
    $routes->post('users/register', 'UserController::register');
    $routes->get('users/verify/(:segment)', 'UserController::verifyEmail/$1');
    $routes->post('users/login', 'UserController::login');
    $routes->post('users/request-password-reset', 'UserController::requestPasswordReset');
    $routes->post('users/reset-password/(:segment)', 'UserController::resetPassword/$1');

    // Rutas para NivelesController (ya definidas)
    $routes->get('niveles', 'NivelesController::index');
    $routes->get('niveles/(:num)', 'NivelesController::show/$1');
    $routes->post('niveles', 'NivelesController::create');
    $routes->put('niveles/(:num)', 'NivelesController::update/$1');
    $routes->delete('niveles/(:num)', 'NivelesController::delete/$1');

    // Rutas para AsignaturaController (ya definidas)
    $routes->get('asignaturas', 'AsignaturaController::index');
    $routes->post('asignaturas', 'AsignaturaController::create');
    $routes->get('asignaturas/(:num)', 'AsignaturaController::show/$1');
    $routes->put('asignaturas/(:num)', 'AsignaturaController::update/$1');
    $routes->delete('asignaturas/(:num)', 'AsignaturaController::delete/$1');

    // Rutas para OasController (nuevo)
    $routes->get('oas/(:num)', 'OasController::index/$1'); // Obtener todos los OAs para una asignatura específica
    $routes->get('oas/detail/(:num)', 'OasController::show/$1');
    $routes->post('oas', 'OasController::create');         // Crear un nuevo OA
    $routes->put('oas/(:num)', 'OasController::update/$1'); // Actualizar un OA existente
    $routes->delete('oas/(:num)', 'OasController::delete/$1'); // Eliminar un OA

    $routes->get('tiposoa', 'TipoOAController::index');
});


$routes->group('web', ['namespace' => 'App\Controllers\Web'], function($routes) {
    $routes->get('login', 'LoginController::index');
    $routes->get('logout', 'LoginController::logout');

    // Ruta para el registro de usuarios
    $routes->get('register', 'RegisterController::index');  // Muestra el formulario de registro
    $routes->post('register', 'RegisterController::create');  // Maneja el envío del formulario

});

$routes->group('user', ['namespace' => 'App\Controllers\Web'], function($routes) {
    $routes->get('home', 'UserController::home');
});


$routes->get('api-docs', 'SwaggerController::documentation');


$routes->group('admin', ['filter' => 'adminfilter', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('home', 'AdminController::home');
    $routes->get('niveles', 'NivelController::index');  // Ruta para la vista de niveles
    $routes->get('asignaturas', 'AsignaturaController::index');  // Ruta para la vista de asignaturas
});


