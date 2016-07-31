<?php

$route = New \Bramus\Router\Router();

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

/* example of calling a controller */
$route->get('/', '\Controller\HomeController@index');

/* example of passing url paramters */
$route->get('post/(.*)', function($id){
	echo 'post - ' . $id;
});

/* example 404 page */
$route->set404(function() {
    return view('404',[
    	'error_number' => '404',
    	'error_message' => 'Page Could Not Be Found'
    ]);
});

$route->run();