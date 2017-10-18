<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Token implements RouterInterface{

	private static $getInstance = null;

	public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router(&$route){
		$route->get('/user-tool/facebook-acc','Frontend\TokenController@facebookManage');
		
		$route->get('/user-tool/manage-token','Frontend\TokenController@manageToken');

		$route->post('/user-tool/facebook-acc-add','Frontend\TokenController@validateAddFbAc');
		$route->post('/user-tool/ajax-check-token','Frontend\TokenController@ajaxCheckToken');
	}

}