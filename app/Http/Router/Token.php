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
		$route->get('/user-tool/facebook-acc/edit/{id}','Frontend\TokenController@facebookManage');
		$route->get('/user-tool/facebook-acc/type/{type}/page/{page}','Frontend\TokenController@facebookManage');
		$route->get('/user-tool/facebook-acc/type/{type}','Frontend\TokenController@facebookManage');
		
		$route->get('/user-tool/manage-token','Frontend\TokenController@manageToken');

		$route->post('/user-tool/facebook-acc-add','Frontend\TokenController@validateAddFbAc');
		$route->post('/user-tool/ajax-check-token','Frontend\TokenController@ajaxCheckToken');
		$route->post('/user-tool/delete-facebook-acc','Frontend\TokenController@ajaxDeleteFacebook');

		$route->post('/user-tool/upload-acc-fb','Frontend\TokenController@uploadAccfb');
		$route->post('/user-tool/upload-token-fb','Frontend\TokenController@uploadTokenFb');
		$route->post('/user-tool/auto-acc-fb','Frontend\TokenController@autoAccFb');
		$route->post('/user-tool/auto-check-token-upload','Frontend\TokenController@autoCheckTokenUpload');

		$route->get('/user-tool/manage-token/type/{type}/page/{page}','Frontend\TokenController@manageToken');
		$route->get('/user-tool/manage-token/type/{type}','Frontend\TokenController@manageToken');

	}

}