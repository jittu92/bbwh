<?php
defined('BASEPATH') or exit('No direct script access allowed');
// print_r('hello');
// die();
$route['default_controller'] = 'admin/AuthController/index';






$route['admin']['GET'] = 'admin/AuthController/index';
$route['admin/login']['GET'] = 'admin/AuthController/index';
$route['admin/login']['POST'] = 'admin/AuthController/login';
$route['admin/logout']['GET'] = 'admin/AuthController/logout';
$route['admin/register']['GET'] = 'admin/AuthController/sign_up';
$route['admin/register']['POST'] = 'admin/AuthController/register';
$route['admin/dashboard']['GET'] = 'admin/AuthController/dashboard';

$route['admin/products']['GET'] = 'admin/ProductsController/index';
$route['admin/products/create']['POST'] = 'admin/ProductsController/create';
$route['admin/products/update/(:num)']['POST'] = 'admin/ProductsController/update';
$route['admin/products/delete/(:num)']['GET'] = 'admin/ProductsController/delete';
$route['admin/products/upload']['POST'] = 'admin/ProductsController/upload';




// Error
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
