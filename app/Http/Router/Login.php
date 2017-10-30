<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Login implements RouterInterface{

	private static $getInstance = null;

	public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router(&$route){
		$route->get('/atl-login','Frontend\LoginController@login');
		$route->post('/check-login','Frontend\LoginController@checkLogin');
		$route->get('/logout','Frontend\LoginController@logout');
	}

}