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
$route['default_controller'] = 'homepage_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 * Admin routes
 */
$route['admin'] = 'admin_controller';
$route['admin/login'] = 'admin_controller/login';

/*
 * Admin config routes
 */
$route['admin/config'] = 'config_controller';


/*
 * Admin User routes
 */
$route['admin/user'] = 'user_controller';
$route['admin/user/post'] = 'user_controller/post';
$route['admin/user/put'] = 'user_controller/put';
$route['admin/user/put/:num'] = 'user_controller/put';
$route['admin/user/delete'] = 'user_controller/index';

/*
 * Admin Company routes
 */
$route['admin/company'] = 'company_controller';


/*
 * Admin banner routes
 */
$route['admin/banner'] = 'banner_controller';
$route['admin/banner/post'] = 'banner_controller/post';
$route['admin/banner/put'] = 'banner_controller/put';
$route['admin/banner/put/:num'] = 'banner_controller/put';
$route['admin/banner/delete'] = 'banner_controller/delete';
$route['admin/banner/view'] = 'banner_controller/view';

/*
 * About routes
 */
$route['admin/about'] = 'about_controller/put';

/*
 * Comments routes
 */
$route['admin/comments'] = 'comments_controller';
$route['admin/comments/post'] = 'comments_controller/post';
$route['admin/comments/put'] = 'comments_controller/put';
$route['admin/comments/put/:num'] = 'comments_controller/put';
$route['admin/comments/delete'] = 'comments_controller/delete';
$route['admin/comments/banner'] = 'comments_controller/comments_index';

/*
 * Admin team routes
 */
$route['admin/team'] = 'team_controller';
$route['admin/team/post'] = 'team_controller/post';
$route['admin/team/put'] = 'team_controller/put';
$route['admin/team/put/:num'] = 'team_controller/put';
$route['admin/team/delete'] = 'team_controller/delete';
//$route['admin/team/view'] = 'team_controller/view';


/*
 * Admin level routes
 */
$route['admin/level'] = 'level_controller';
$route['admin/level/post'] = 'level_controller/post';
$route['admin/level/put'] = 'level_controller/put';
$route['admin/level/put/:num'] = 'level_controller/put';
$route['admin/level/delete'] = 'level_controller/delete';
