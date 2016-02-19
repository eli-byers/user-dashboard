<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['404_override'] = '';
$route['default_controller'] = "index";
$route['register'] = 'index/register';
$route['login'] = 'index/login';
$route['login_user'] = '/users/login';
$route['register_user'] = '/users/register';
$route['profile'] = '/users/profile';
