# Vertex

A simple PHP framework inspired by Laravel

[![GitHub Actions](https://github.com/Daniel-Griffiths/vertex/actions/workflows/tests.yml/badge.svg)](https://github.com/Daniel-Griffiths/vertex/actions)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Daniel-Griffiths/vertex/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Daniel-Griffiths/vertex/?branch=master)

## Requirements

Vertex makes use of [Composer](https://getcomposer.org/) to autoload its dependencies. Be sure to run the following command after downloading the framework.

```
composer install
```

Then you can run the following command to start the built-in PHP server.

```
php -S localhost:8000 -t public
```

## Configuration

All configuration options are specified in the `.env` file in the root directory. By default you will get an example file to get you started.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databasename
DB_USERNAME=root
DB_PASSWORD=root
```

There is also the option of manually declaring your setting in the `/config` directory. Simply go into any of the files in this directory and manually replace the `getenv()` functions with your desired configuration.

You can easily access any of your config options in Vertex by using the `Config::get()` method. Supply a string to the method (eg `Config::get('database')`) and it will return an array of all the values specified in that file, in this case it would be `/config/database.php`.

## Routes

Vertex uses FastRoute for all its routing needs. Routes are stored in the `app/routes.php` file. Please visit the following repo for full documentation [https://github.com/nikic/FastRoute](https://github.com/nikic/FastRoute).

Here are some example routes:

```
/* standard routes */
$route->get('/test', 'ControllerName@MethodName');
$route->post('/test', 'ControllerName@MethodName');
$route->put('/test', 'ControllerName@MethodName');
$route->delete('/test', 'ControllerName@MethodName');

/* route with parameters */
$route->get('/test/{parameter}', 'ControllerName@MethodName');

/* route with closure */
$route->get('/test', function(){
  return 'Test!';
});

/* route group */
$route->addGroup('/admin', function ($route) {
    $route->get('/dashboard', 'AdminController@dashboard'); // admin/dashboard
    $route->get('/pages', 'AdminController@pages');         // admin/pages
    $route->get('/posts', 'AdminController@posts');         // admin/posts
});
```

## Templating

Vertex uses Laravels fantastic Blade templating engine. Views are stored in the `app/resources/views/` directory and **must** have the file extension of `.blade.php`. Please visit [https://laravel.com/docs/5.3/blade](https://laravel.com/docs/5.3/blade) for full documentation.

Here is an example blade template:

```
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
```
