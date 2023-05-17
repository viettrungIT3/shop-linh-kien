<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login';
$route['verify/(:any)']                = "login/verify_otp/$1";
$route['register'] = 'login/register';

//forgot password
$route['forgot-password']       = "login/forgot_password";
$route['forgot-password']       = "login/forgot_password";
$route['password-email-sent']   = "login/password_email_sent";
$route['reset-password/(:any)/(:any)']  = "login/reset_password/$1/$2";
$route['reset-password-success']        = "page/reset_password_success";

//logout
$route['logout']              = "login/logout";
$route['logout-due-to-inactivity']  = "login/activity_logout";

// Dashboard 
$route['single-product/(:num)']     = "dashboard/single_product/$1";
$route['shop']                      = "dashboard/shop";
$route['shop/(:num)']               = "dashboard/shop/$1";
$route['checkout/(:any)']           = "dashboard/checkout/$1";
$route['cart']                      = "dashboard/cart";
$route['order']                     = "dashboard/order";

// Dashboard_Admin
$route['admin']                     = "Dashboard_Admin/index";
$route['admin/products']            = "Dashboard_Admin/products";
$route['admin/categories']          = "Dashboard_Admin/categories";
$route['admin/my-categories']       = "Dashboard_Admin/my_categories";
$route['admin/products']            = "Dashboard_Admin/products";
$route['admin/my-products']         = "Dashboard_Admin/my_products";
$route['admin/products/(:num)']     = "Dashboard_Admin/products_by_status/$1";
$route['admin/orders']              = "Dashboard_Admin/orders";
$route['admin/orders/(:num)']       = "Dashboard_Admin/orders/$1";


// ---------api----------
$route_prefix = "api/v1/";

// category
$route[$route_prefix.'categories']                      = "category/list";
$route[$route_prefix.'category/(:num)']                 = "category/get/$1";
$route[$route_prefix.'category/create']                 = "category/create";
$route[$route_prefix.'category/update']                 = "category/update";
$route[$route_prefix.'category/delete/(:num)/(:num)']   = "category/delete/$1/$2";

// product
$route[$route_prefix.'products']                        = "product/list";
$route[$route_prefix.'product/(:num)']                  = "product/get/$1";
$route[$route_prefix.'product/create']                  = "product/create";
$route[$route_prefix.'product/update']                  = "product/update";
$route[$route_prefix.'product/delete/(:num)/(:num)']    = "product/delete/$1/$2";

// product_images
$route[$route_prefix.'product_images/create']                  = "product_images/create";

// cart
$route[$route_prefix.'cart/create']                     = "cart/create";
$route[$route_prefix.'cart/list']                       = "cart/listAll";
$route[$route_prefix.'cart/list/(:num)']                = "cart/list/$1";
$route[$route_prefix.'cart/delete/(:num)/(:num)']       = "cart/delete/$1/$2";

// order
$route[$route_prefix.'order/create']                        = "order/create";
$route[$route_prefix.'order/(:num)/change-status/(:num)']   = "order/changeStatus/$1/$2";
$route[$route_prefix.'order/get/(:num)']                    = "order/get/$1";
// $route[$route_prefix.'order/list']                       = "order/listAll";
// $route[$route_prefix.'order/list/(:num)']                = "order/list/$1";
// $route[$route_prefix.'order/delete/(:num)/(:num)']       = "order/delete/$1/$2";

// upload image
$route['upload']            = "upload/index";