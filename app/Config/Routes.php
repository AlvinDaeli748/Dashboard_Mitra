<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route Halaman 
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');

// Route untuk Login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');
