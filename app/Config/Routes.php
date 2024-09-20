<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->post('users/register', 'UserController::register');
    $routes->get('users/verify/(:segment)', 'UserController::verifyEmail/$1');
    $routes->post('users/login', 'UserController::login');
    $routes->post('users/request-password-reset', 'UserController::requestPasswordReset');
    $routes->post('users/reset-password/(:segment)', 'UserController::resetPassword/$1');
});

$routes->group('web', ['namespace' => 'App\Controllers\Web'], function($routes) {
    $routes->get('login', 'LoginController::index');
    $routes->post('login/authenticate', 'LoginController::authenticate');
    $routes->get('logout', 'LoginController::logout');
});

$routes->group('user', ['namespace' => 'App\Controllers\Web'], function($routes) {
    $routes->get('home', 'UserController::home');
});


$routes->get('api-docs', 'SwaggerController::documentation');


$routes->group('admin', ['filter' => 'admin', 'namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('home', 'AdminController::home');
});

