<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Phần Frontend
$routes->get('/', 'HomeFrontend::index');
$routes->get('/products', 'ProductFrontend::index');
$routes->get('/product/detail/(:num)', 'ProductFrontend::detail/$1');
$routes->get('/products/(:num)', 'ProductFrontend::index/$1');//Dành cho phân trang sản phẩm
$routes->get('/products/ajaxpaging/(:num)', 'ProductFrontend::ajaxpaging/$1'); 

 


//Giỏ hàng
$routes->get('/cart', 'Cart::index');
$routes->get('/cart/(:num)', 'Cart::index/$1');
$routes->post('/cart/update/(:num)', 'Cart::update/$1');//Dùng ajax để cập nhật
$routes->get('/cart/delete/(:num)', 'Cart::delete/$1');
$routes->post('/cart/form', 'Cart::form');
//Thực hiện thanh toán
$routes->post('/cart/payment', 'Cart::payment');




//Phần Backend = admin
//Dành cho trang quản trị
$routes->get('/admin', 'HomeAdmin::index'); //Vào trang chủ của màn hình admin

$routes->get('/admin/qlproduct', 'QLProductAdmin::index');
$routes->get('/admin/qlproduct/delete/(:num)', 'QLProductAdmin::delete/$1');
//Thêm sản phẩm mới
$routes->get('/admin/qlproduct/add', 'QLProductAdmin::add');
$routes->post('/admin/qlproduct/add', 'QLProductAdmin::insert');
//Cập nhật sản phẩm mới
$routes->get('/admin/qlproduct/update/(:num)', 'QLProductAdmin::update/$1');
$routes->post('/admin/qlproduct/update', 'QLProductAdmin::edit');

$routes->get('/admin/login', 'LoginAdmin::login');
$routes->post('/admin/login/sign', 'LoginAdmin::sign');
$routes->get('/contactadmin','contact::index');
//$routes->get('/ContactesAdmin','Contactes::index');
$routes->get('/dieukhoangview','dieukhoang::index');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
