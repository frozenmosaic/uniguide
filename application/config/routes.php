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
|	http://codeigniter.com/user_guide/general/routing.html
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

/*
| -------------------------------------------------------------------------
| CUSTOM URI ROUTING
| -------------------------------------------------------------------------
| Routing static Urls displayed in the address bar to the default segment-based of CI
|
*/

$handlers = array(
 'majors' => 'admin/majors',
 'school-facts' => 'admin/schoolFacts'
 );

foreach ($handlers as $key => $value) {
 $route['admin/'.$key] = $value;
}

//---The first level---
$route['gioi-thieu'] = "introduction";
// $route['admin'] = "admin/admin/process";
$route['bai-viet'] = "article/process";
$route['du-lieu-truong'] = "college/process";
$route['nganh-hoc'] = "majors/process";

//---The second level---
// $route['admin/(:any)'] = 'admin/admin/process/$1';
$route['bai-viet/(:any)'] = "article/process/$1";
$route['du-lieu-truong/(:any)'] = "college/process/$1";
$route['nganh-hoc/(:any)'] = "majors/process/$1";

//---The third level---
$route['bai-viet/(:any)/(:any)'] = "article/process/$1/$2";


 