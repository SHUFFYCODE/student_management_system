<?php


use CodeIgniter\Router\RouteCollection;


/** @var RouteCollection $routes */


$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register-save', 'AuthController::registerUser');
$routes->get('/login', 'AuthController::login');
$routes->post('/login-check', 'AuthController::loginCheck');
$routes->get('/logout', 'AuthController::logout');


$routes->group('students', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->get('read/(:any)', 'StudentController::read/$1');
});


$routes->group('students', ['filter' => 'adminonly'], function($routes) {
    $routes->get('create', 'StudentController::create');
    $routes->post('store', 'StudentController::store');
    $routes->get('edit/(:any)', 'StudentController::edit/$1');
    $routes->post('update/(:any)', 'StudentController::update/$1');
    $routes->get('delete/(:any)', 'StudentController::delete/$1');
});


$routes->get('/dashboard', function () {
    return 'You are logged in!';
});


$routes->get('/check-role', function () {
    return session('role');
});


$routes->get('generate-password', 'AuthController::generatePassword');


$routes->group('api', ['namespace' => 'App\Controllers\API'], function($routes) {
    $routes->get('students', 'StudentApiController::index');
    $routes->get('students/(:num)', 'StudentApiController::show/$1');
    $routes->post('students', 'StudentApiController::create');
    $routes->put('students/(:num)', 'StudentApiController::update/$1');
    $routes->delete('students/(:num)', 'StudentApiController::delete/$1');
});


