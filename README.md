# Vertex
A simple PHP framework

## Requirements
Vertex makes use of composer to autoload its dependencies. Be sure to run the `composer install` after you download the framework. 

Once all the dependencies have been installed you can get started by pointing your server of choice to the `/public` directory. 

## Configuration
All configuration options are specified in the `.env` file in the root directory. By default a '.env.example' file is included, you can rename this to `.env` to get started.

## Routes
Vertex uses Bramus's fantastic routing class. Routes are stored in the `app/routes.php` file. Please visit the following repo for full documentation  `https://github.com/bramus/router/`.

## Templating
Vertex currently uses Twigs fantastic templating engine. Views are stored in the `app/views/` directory and **must** have the file extension of `.html`. Please visit `http://twig.sensiolabs.org/documentation` for full documentation.

Caching can be enabled in `/app/config/view.php` however it is recommended setting this to `false` during development.
