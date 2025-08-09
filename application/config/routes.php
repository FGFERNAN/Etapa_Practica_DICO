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
$route['productos'] = 'productos/index';
$route['categorias'] = 'categorias/index';
$route['productos/papelera'] = 'productos/papelera';
$route['productos/crear'] = 'productos/crear';
$route['productos/guardar'] = 'productos/guardar';
$route['productos/editar/(:num)'] = 'productos/editar/$1';
$route['productos/actualizar/(:num)'] = 'productos/actualizar/$1';
$route['productos/eliminar/(:num)'] = 'productos/eliminacionLogica/$1';
$route['productos/eliminar-definitivo/(:num)'] = 'productos/eliminacionFisica/$1';
$route['productos/activar/(:num)'] = 'productos/activar/$1';
$route['categorias/crear'] = 'categorias/crear';
$route['categorias/guardar'] = 'categorias/guardar';
$route['categorias/papelera'] = 'categorias/papelera';
$route['categorias/editar/(:num)'] = 'categorias/editar/$1';
$route['categorias/actualizar/(:num)'] = 'categorias/actualizar/$1';
$route['categorias/eliminar/(:num)'] = 'categorias/eliminacionLogica/$1';
$route['categorias/eliminar-definitivo/(:num)'] = 'categorias/eliminacionFisica/$1';
$route['categorias/activar/(:num)'] = 'categorias/activar/$1';
$route['categorias/asociar/(:num)'] = 'categorias/asociar/$1';
$route['categorias/asignar/(:num)'] = 'categorias/asignar/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
