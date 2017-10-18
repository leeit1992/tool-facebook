<?php
/*
|--------------------------------------------------------------------------
| Router for project
|--------------------------------------------------------------------------
*/

/*============================
=            Main            =
============================*/

$route->get('/user-tool','Frontend\MainController@index');

/*=====  End of Main  ======*/

App\Http\Router\Token::getInstance()->router($route);
App\Http\Router\Tool::getInstance()->router($route);

App\Http\Router\Login::getInstance()->router($route);
App\Http\Router\User::getInstance()->router($route);