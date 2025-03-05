<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rute untuk semua pengguna yang sudah login
$routes->group('', ['filter' => 'jwtAuth'], function ($routes) {
    $routes->get('/items', 'ItemController::index');
    $routes->get('/items/create', 'ItemController::create');
    $routes->post('/items/store', 'ItemController::store');
    $routes->get('/items/edit/(:num)', 'ItemController::edit/$1');
    $routes->post('/items/update/(:num)', 'ItemController::update/$1');
    $routes->get('/items/delete/(:num)', 'ItemController::delete/$1');
});

// Rute khusus Administrator
$routes->group('', ['filter' => 'jwtAuth:administrator'], function ($routes) {
    $routes->get('/employees', 'EmployeeController::index');
    $routes->get('/employees/create', 'EmployeeController::create');
    $routes->post('/employees/store', 'EmployeeController::store');
    $routes->get('/employees/edit/(:num)', 'EmployeeController::edit/$1');
    $routes->post('/employees/update/(:num)', 'EmployeeController::update/$1');
    $routes->get('/employees/delete/(:num)', 'EmployeeController::delete/$1');
});

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/', 'Home::index', ['filter' => 'jwtAuth']);
