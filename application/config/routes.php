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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['admin/setting'] = 'AdminController/setting';
$route['admin/employers_import'] = 'AdminController/employersImport';
$route['admin/employers'] = 'AdminController/employers';
$route['admin/employers/([0-9]+)'] = 'AdminController/siteEmployers/$1';
$route['admin/employer_edit/([0-9]+)'] = 'AdminController/employerEdit/$1';

$route['admin/fields'] = 'AdminController/fields';
$route['admin/fields_edit/([0-9]+)'] = 'AdminController/fieldsEdit/$1';

$route['admin/site_new'] = 'AdminController/siteNew';
$route['admin/site_edit/([0-9]+)'] = 'AdminController/siteEdit/$1';
$route['admin/site_list'] = 'AdminController/siteList';
$route['admin'] = 'AdminController/dashboard';


$route['admin_api/site_new'] = 'AdminAPIController/siteNew';
$route['admin_api/site_update'] = 'AdminAPIController/siteUpdate';
$route['admin_api/site_delete'] = 'AdminAPIController/siteDelete';

$route['admin_api/employers_import'] = 'AdminAPIController/employersImport';
$route['admin_api/employers_import_save'] = 'AdminAPIController/employersImportSave';
$route['admin_api/employers_load'] = 'AdminAPIController/employersLoad';
$route['admin_api/employer_update'] = 'AdminAPIController/employerUpdate';

$route['admin_api/field_add'] = 'AdminAPIController/fieldAdd';
$route['admin_api/employers_fields_load'] = 'AdminAPIController/employersFieldsLoad';
$route['admin_api/field_update'] = 'AdminAPIController/fieldUpdate';
$route['admin_api/field_delete'] = 'AdminAPIController/fieldDelete';

$route['admin_api/jb_integrate_code'] = 'AdminAPIController/jobboardIntegrateCode';

$route['script/(:any)/(:any)'] = 'JBController/generate/$1/$2';
$route['call_ts'] = 'JBController/callTS';