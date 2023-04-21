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
$route['single-product']  = "dashboard/single_product";
$route['shop']  = "dashboard/shop";
$route['checkout']  = "dashboard/checkout";
$route['cart']  = "dashboard/cart";

// Dashboard_Admin
$route['admin']  = "Dashboard_Admin/index";
$route['admin/products']  = "Dashboard_Admin/products";