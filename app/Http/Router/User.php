<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class User implements RouterInterface
{
	private static $getInstance = null;

	public static function getInstance() {
        if ( !( self::$getInstance instanceof self ) ) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router( &$route ){
		$route->get('/user-tool/manage-user','Frontend\UserController@manageUsers');
		$route->get('/user-tool/manage-user/page/{page}','Frontend\UserController@manageUsers');
		$route->get('/user-tool/add-user','Frontend\UserController@handleUser');
		$route->get('/user-tool/edit-user/{id}','Frontend\UserController@handleUser', [ 'id' => '\d+' ] );
		$route->get('/user-tool/ajax-manage-user','Frontend\UserController@ajaxManageUser');
		
		$route->post('/user-tool/validate-user','Frontend\UserController@validateUser' );
		$route->post('/user-tool/delete-user','Frontend\UserController@ajaxDelete' );
	}
}
