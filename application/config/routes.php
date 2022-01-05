<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Daftar_Controller/pilih_jalur';
$route['404_override'] = 'Daftar_Controller/pilih_jalur';
$route['translate_uri_dashes'] = FALSE;

// Daftar Controller
$route['pilih-jalur'] = 'Daftar_Controller/pilih_jalur';
$route['form-pendaftaran/(pmdp|ktmse)'] = 'Daftar_Controller/form_pendaftaran';
$route['terima-kasih'] = 'Daftar_Controller/terima_kasih';

// Admin Controller
$route['admin'] = 'Admin_Controller/admin';
$route['admin/login'] = 'Admin_Controller/login';
$route['admin/logout'] = 'Admin_Controller/logout';
$route['admin/settings'] = 'Admin_Controller/settings';
// $route['update-profile'] = 'Admin_Controller/update_profile';
// $route['change-password'] = 'Admin_Controller/change_password';
$route['admin/data-pendaftar/ubah/:any'] = 'Admin_Controller/ubah_pendaftar';
$route['admin/data-pendaftar/(pmdp|ktmse|pmdp-ktmse)/hapus/:any'] = 'Admin_Controller/hapus_pendaftar';
$route['admin/data-pendaftar/(pmdp|ktmse|pmdp-ktmse)/export'] = 'Admin_Controller/export_to_excel';
$route['admin/data-pendaftar/(pmdp|ktmse|pmdp-ktmse)'] = 'Admin_Controller/data_pendaftar';
