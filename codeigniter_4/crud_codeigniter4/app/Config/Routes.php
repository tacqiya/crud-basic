<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/crud', 'Crud::index');
$routes->get('/crud/add', 'Crud::add');
$routes->post('/crud/add_validation', 'Crud::add_validation');
$routes->get('/crud/fetch_single_data/(:num)', 'Crud::fetch_single_data/$1');
$routes->post('/crud/edit_validation', 'Crud::edit_validation');
$routes->get('/crud/delete/(:num)', 'Crud::delete/$1');
