# Vertex
A simple PHP framework

[![CircleCI](https://circleci.com/gh/Daniel-Griffiths/Vertex.svg?style=shield)](https://circleci.com/gh/Daniel-Griffiths/Vertex)

## Requirements
Vertex makes use of [Composer](https://getcomposer.org/) to autoload its dependencies. Be sure to run `composer install` after you download the framework. 

## Gulp 
Once all the dependencies have been installed you can get started using [Gulp](http://gulpjs.com/). This step is completely optional and you can skip this if your project doesnt require a build step!

Firstly, ensure that you have both [Node.js](https://nodejs.org/en/) and [NPM](https://www.npmjs.com/) are installed on your machine. You can check this by running the `-v` command:

```
node -v
npm -v
```

Next, you will need to pull in [Gulp](http://gulpjs.com/) as a global NPM package:

```
npm install --global gulp-cli
```

After that you will then need to run the npm install command to pull in all of the [Gulp](http://gulpjs.com/) dependencies
```
npm install
```

Finally run the `gulp` commmand on the root of your project. This will automatically create a local php server to get you up and running. 

## Configuration
All configuration options are specified in the `.env` file in the root directory. By default you will get an example file to get you started. 

```
DB_ENABLED=false #set to true to enable database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databasename
DB_USERNAME=root
DB_PASSWORD=root
```

There is also the option of manually declare your setting in the `app/config/` directory. Simply go into any of the files in this directory and manually replace the `getenv()` functions with your desired configuration.

You can easily access any of your config options in Vertex by using the `Config::get()` method. Supply a string to the method (eg `Config::get('database')`) and it will return an array of all the values specified in that file, in this case it would be `app/config/database.php`.

## Routes
Vertex uses FastRoute for all its routing needs. Routes are stored in the `app/routes.php` file. Please visit the following repo for full documentation  [https://github.com/nikic/FastRoute](https://github.com/nikic/FastRoute).

Here are some example routes:
```
/* standard routes */
$route->get('/test', 'ControllerName@MethodName');
$route->post('/test', 'ControllerName@MethodName');
$route->put('/test', 'ControllerName@MethodName');
$route->delete('/test', 'ControllerName@MethodName');

/* routes with parameters */
$route->get('/test/{parameter}', 'ControllerName@MethodName');
```

## Templating
Vertex uses Laravels fantastic Blade templating engine. Views are stored in the `app/resources/views/` directory and **must** have the file extension of `.blade.php`. Please visit [https://laravel.com/docs/5.3/blade](https://laravel.com/docs/5.3/blade) for full documentation.

## Email
Vertex uses PHPMailer to send emails. There are no fancy wrapper classes as of yet, however all the standard methods defined in the [PHPMailer](https://github.com/PHPMailer/PHPMailer) documentation are available.
