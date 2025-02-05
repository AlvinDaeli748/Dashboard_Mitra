<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route Halaman 
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');

// Route TAP Mitra 
$routes->get('/tap_mitra', 'TAPMitraController::tap_mitra');
$routes->post('tap_mitra/getBranches', 'TAPMitraController::getBranches');
$routes->post('tap_mitra/getClusters', 'TAPMitraController::getClusters');
$routes->post('tap_mitra/getCities', 'TAPMitraController::getCities');
$routes->post('tap_mitra/getMitras', 'TAPMitraController::getMitras');
$routes->post('tap_mitra/getNamaTAP', 'TAPMitraController::getNamaTAP');
$routes->post('/tap_mitra/save', 'TAPMitraController::save');


// Route untuk Login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');
