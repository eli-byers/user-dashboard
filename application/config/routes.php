<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['404_override'] = '';
$route['default_controller'] = "index";

$route['register'] = 'index/register';					// views
$route['login'] = 'index/login';

$route['login_user'] = '/users/login';					// controlers
$route['register_user'] = '/users/register';
$route['logoff'] = 'users/logout';

$route['dashboard/admin'] = '/users/admin_dashboard';	// views
$route['dashboard'] = '/users/dashboard';
$route['users/new'] = 'users/create_users';

$route['profile/(:any)'] = '/users/show/$1';
