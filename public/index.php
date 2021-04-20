<?php

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$router = new Src\Core\Router();

$router->get('#^/$#', 'HomeController@welcome');

$router->get('#^/articles$#', 'ArticleController@index');
$router->get('#^/articles/show/(.+?)$#', 'ArticleController@show');
$router->get('#^/articles/create$#', 'ArticleController@create');
$router->get('#^/articles/update/(.+?)$#', 'ArticleController@update');

$router->post('#^/articles/update/(.+?)$#', 'ArticleController@update');
$router->post('#^/articles/delete/(.+?)$#', 'ArticleController@delete');
$router->post('#^/articles/store$#', 'ArticleController@store');

$router->resolve();






