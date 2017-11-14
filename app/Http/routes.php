<?php
/*
|--------------------------------------------------------------------------
| Router for project
|--------------------------------------------------------------------------
*/

/*============================
=            Main            =
============================*/
$route->get('','MainController@index');
$route->get('/user-tool','Frontend\MainController@index');
$route->get('/user-tool/error-404','Frontend\MainController@page404');
$route->get('/user-tool/auto-cronjob','Frontend\ShellController@action');
$route->get('/user-tool/auto-cronjob2','Frontend\ShellController@action2');

/*=====  End of Main  ======*/

App\Http\Router\Token::getInstance()->router($route);
App\Http\Router\Tool::getInstance()->router($route);

App\Http\Router\Login::getInstance()->router($route);
App\Http\Router\User::getInstance()->router($route);
App\Http\Router\Service::getInstance()->router( $route );
App\Http\Router\Pay::getInstance()->router( $route );
App\Http\Router\Buy::getInstance()->router( $route );
