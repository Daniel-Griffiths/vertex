# Vertex
A simple PHP framework

## Requirements
Vertex makes use of composer to autoload its dependencies. Be sure to run the `composer install` after you download the framework. 

## Configuration
All configuration options are specified in the `.env` file in the root directory. Currently this only contains database settings, however this will be expanded overtime.

## Routes
Vertex uses Bramus's fantastic routing class. Routes are stored in the `app/routes.php` file. Pease visit the following repo for full documentation  `https://github.com/bramus/router/`.

## Templating
Vertex currently uses Twigs fantastic templating engine. Views are stored in the `app/views/` directory and **must** have the file extenstion of `.html`. Please visit `http://twig.sensiolabs.org/documentation` for full documention.
