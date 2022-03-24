<?php

namespace Config;

use App\Controllers\AddressController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'RegisterController::index');
$routes->get('shopping', 'AddressController::index');
$routes->get('insert', 'AddressController::address');
$routes->post('insert','AddressController::insert');
$routes->get('/delete/(:num)', 'AddressController::delete/$1');
$routes->get('/home/(:num)', 'AddressController::delete/$1');
$routes->get('/update/(:num)', 'AddressController::edit/$1');
$routes->post('/update/(:num)', 'AddressController::updatejob/$1',['filter'=>'isLoggedIn']);
//the new paths for registration....
$routes->post('register','RegisterController::register');
$routes->get('login','RegisterController::loginuser');
$routes->post('login','RegisterController::login');
$routes->get('logout','RegisterController::logout');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
