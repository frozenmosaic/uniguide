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

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| CUSTOM URI ROUTING
| -------------------------------------------------------------------------
| Routing static Urls displayed in the address bar to the default segment-based of CI
|
*/
$uri_arr = $this->uri->segment_array();

/*=== ADMIN ROUTING ===*/



if ($this->uri->segment(1) == 'admin') {
    $route['admin'] = 'admin/admin';
    
    /*
        array($key => $value)
        $key = url segment
        $value = controller
    */
    $admin_handlers = array('majors' => 'majors', 'articles' => 'articles', 'school-facts' => 'schoolFacts', 'school-ops' => 'schoolOps');
    
    foreach ($admin_handlers as $key => $value) {
        $route['admin/' . $key] = 'admin/' . $value;
    }
}

/*=== FRONT ROUTING ===*/

else {
    
    if (count($uri_arr) < 2) {
        
        $top_lvl_articles = array('gioi-thieu', 'bai-viet', 'thu-vien', 'lien-lac');
        
        foreach ($top_lvl_articles as $value) {
            $route[$value] = 'article/loadTopArticle/' . $value;
        }
    } 
    else {
        $parent_article = $this->uri->segment(1);
        $level = count($uri_arr);
        $article = end($uri_arr);
        
        $uri_string = $this->uri->uri_string();
        
        $route[$uri_string] = 'article/loadLevelArticle/' . $parent_article . '/' . $level . '/' . $article;
                
    }
}

// $route['gioi-thieu'] = "introduction";
// $route['bai-viet'] = "article/process";
// $route['du-lieu-truong'] = "college/process";
// $route['nganh-hoc'] = "majors/process";

// $route['bai-viet/(:any)'] = "article/process/$1";
// $route['du-lieu-truong/(:any)'] = "college/process/$1";
// $route['nganh-hoc/(:any)'] = "majors/process/$1";

// $route['bai-viet/(:any)/(:any)'] = "article/process/$1/$2";

