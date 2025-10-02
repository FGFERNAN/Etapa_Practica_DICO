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
$route['default_controller'] = 'auth';
$route['productos'] = 'productos/index';
$route['productos/filtrar/(:num)'] = 'productos/filtrar/$1';
$route['categorias'] = 'categorias/index';
$route['productos/archivo'] = 'productos/archivo';
$route['productos/crear'] = 'productos/crear';
$route['productos/guardar'] = 'productos/guardar';
$route['productos/editar/(:num)'] = 'productos/editar/$1';
$route['productos/actualizar/(:num)'] = 'productos/actualizar/$1';
$route['productos/eliminar/(:num)'] = 'productos/eliminacionLogica/$1';
$route['productos/eliminar-definitivo/(:num)'] = 'productos/eliminacionFisica/$1';
$route['productos/activar/(:num)'] = 'productos/activar/$1';
$route['categorias/crear'] = 'categorias/crear';
$route['categorias/guardar'] = 'categorias/guardar';
$route['categorias/archivo'] = 'categorias/archivo';
$route['categorias/editar/(:num)'] = 'categorias/editar/$1';
$route['categorias/actualizar/(:num)'] = 'categorias/actualizar/$1';
$route['categorias/eliminar/(:num)'] = 'categorias/eliminacionLogica/$1';
# $route['categorias/eliminar-definitivo/(:num)'] = 'categorias/eliminacionFisica/$1';
$route['categorias/activar/(:num)'] = 'categorias/activar/$1';
$route['categorias/asociar/(:num)'] = 'categorias/asociar/$1';
$route['categorias/asignar/(:num)'] = 'categorias/asignar/$1';
$route['proveedores'] = 'proveedores/index';
$route['proveedores/crear'] = 'proveedores/crear';
$route['proveedores/guardar'] = 'proveedores/guardar';
$route['proveedores/archivo'] = 'proveedores/archivo';
$route['proveedores/editar/(:num)'] = 'proveedores/editar/$1';
$route['proveedores/actualizar/(:num)'] = 'proveedores/actualizar/$1';
$route['proveedores/eliminar/(:num)'] = 'proveedores/eliminacionLogica/$1';
# $route['proveedores/eliminar-definitivo/(:num)'] = 'proveedores/eliminacionFisica/$1';
$route['proveedores/activar/(:num)'] = 'proveedores/activar/$1';
$route['proveedores/asignar/(:num)'] = 'proveedores/asignar/$1';
$route['proveedores/asignar_c/(:num)'] = 'proveedores/asignar_contingencia/$1';
$route['proveedores/asociar/(:num)'] = 'proveedores/asociar/$1';
$route['compras'] = 'compras/index';
$route['compras/realizar'] = 'compras/realizar';
$route['compras/guardar'] = 'compras/guardar';
$route['compras/detalle/(:num)'] = 'compras/detalle/$1';
$route['ventas'] = 'ventas/index';
$route['ventas/facturar'] = 'ventas/facturar';
$route['ventas/guardar'] = 'ventas/guardar';
$route['ventas/detalle/(:num)'] = 'ventas/detalle/$1';
$route['inventario'] = 'inventario/index';
$route['usuarios'] = 'usuarios/index';
$route['usuarios/archivo'] = 'usuarios/archivo';
$route['usuarios/crear'] = 'usuarios/crear';
$route['usuarios/guardar'] = 'usuarios/guardar';
$route['usuarios/editar/(:num)'] = 'usuarios/editar/$1';
$route['usuarios/actualizar/(:num)'] = 'usuarios/actualizar/$1';
$route['usuarios/eliminar/(:num)'] = 'usuarios/eliminacion_logica/$1';
# $route['usuarios/eliminar-definitivo/(:num)'] = 'usuarios/eliminacion_fisica/$1';
$route['usuarios/activar/(:num)'] = 'usuarios/activar/$1';
$route['login'] = 'auth/index';
$route['auth/verificar'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['recuperar-contrasena'] = 'auth/recuperar_contrasena';
$route['nueva-contrasena/(:any)'] = 'auth/reset_password/$1';
$route['perfil/(:num)'] = 'perfil/editar_perfil/$1';
$route['perfil/editar-perfil/(:num)'] = 'perfil/actualizar_perfil/$1';
$route['perfil/cambiar-contrasena'] = 'perfil/cambiar_contrasena';
$route['reportes'] = 'reportes/index';
$route['reportes/filtrar/(:num)'] = 'reportes/filtrar/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
