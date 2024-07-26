<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/Pages/create', 'Pages::tambah');
$routes->get('/Pages/edit/(:segment)', 'Pages::edit/$1');
$routes->delete('/Pages/(:num)', 'Pages::delete/$1');


$routes->get('/', 'Datastasiun::datastasiun');
$routes->get('/Datastasiun/create', 'Datastasiun::tambah');
$routes->get('/Datastasiun/edit/(:segment)', 'Datastasiun::edit/$1');
$routes->delete('/Datastasiun/(:num)', 'Datastasiun::delete/$1');


$routes->get('/', 'Inventory::datainventory');
$routes->get('/Inventory/create', 'Inventory::tambah');
$routes->get('/Inventory/edit/(:segment)', 'Inventory::edit/$1');
$routes->delete('/Inventory/(:num)', 'Inventory::delete/$1');

$routes->get('/', 'Datateknisi::datateknisi');
$routes->get('/Datateknisi/create', 'Datateknisi::tambah');
$routes->get('/Datateknisi/edit/(:segment)', 'Datateknisi::edit/$1');
$routes->delete('/Datateknisi/(:num)', 'Datateknisi::delete/$1');

$routes->get('/', 'User::datauser');
$routes->get('/User/create', 'User::tambah');
$routes->get('/User/edit/(:segment)', 'User::edit/$1');
$routes->delete('/User/(:num)', 'User::delete/$1');

$routes->get('/', 'Login::index');
$routes->get('/Login/login', 'Login::login');


// $routes->get('/tambah/(:segment)', 'Pages::detail/$1');
