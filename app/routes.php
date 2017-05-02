<?php

use Vertex\Core\View;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here you can list all the routes for your application.
| There are a few example routes included, feel free
| to delete these.
|
*/

$route->get('/', 'ExampleController@index');

/**
 * Example route with parameters
 */
//$route->get('/news/{id}', 'NewsController@index');

/**
 * Example route group
 */
// $route->addGroup('/admin', function ($route) {
//     $route->get('/dashboard', 'AdminController@dashboard');
//     $route->get('/pages', 'AdminController@pages');
//     $route->get('/posts', 'AdminController@posts');
// });
