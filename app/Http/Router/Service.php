<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Service implements RouterInterface
{
	private static $getInstance = null;

	public static function getInstance() {
        if ( !( self::$getInstance instanceof self ) ) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router( &$route ) {
		// packet service
		$route->get('/user-tool/manage-packet-service','Frontend\ServiceController@managePacketService');
		$route->get('/user-tool/manage-packet-service/page/{page}','Frontend\ServiceController@managePacketService');
		$route->get('/user-tool/add-packet-service','Frontend\ServiceController@handlePacketService');
		$route->get('/user-tool/edit-packet-service/{id}','Frontend\ServiceController@handlePacketService', [ 'id' => '\d+' ] );
		
		$route->post('/user-tool/validate-packet-service','Frontend\ServiceController@validatePacketService' );
		$route->post('/user-tool/delete-packet-service','Frontend\ServiceController@ajaxDelete' );

		// packet like
		$route->get('/user-tool/manage-packet-like','Frontend\ServiceController@managePacketLike');
		$route->get('/user-tool/manage-packet-like/page/{page}','Frontend\ServiceController@managePacketLike');
		$route->get('/user-tool/add-packet-like','Frontend\ServiceController@handlePacketLike');
		$route->get('/user-tool/edit-packet-like/{id}','Frontend\ServiceController@handlePacketLike', [ 'id' => '\d+' ] );
		
		$route->post('/user-tool/validate-packet-like','Frontend\ServiceController@validatePacketLike' );
		$route->post('/user-tool/delete-packet-like','Frontend\ServiceController@ajaxDelete' );

		// packet comment
		$route->get('/user-tool/manage-packet-comment','Frontend\ServiceController@managePacketComment');
		$route->get('/user-tool/manage-packet-comment/page/{page}','Frontend\ServiceController@managePacketComment');
		$route->get('/user-tool/add-packet-comment','Frontend\ServiceController@handlePacketComment');
		$route->get('/user-tool/edit-packet-comment/{id}','Frontend\ServiceController@handlePacketComment', [ 'id' => '\d+' ] );

		$route->post('/user-tool/validate-packet-comment','Frontend\ServiceController@validatePacketComment' );
		$route->post('/user-tool/delete-packet-comment','Frontend\ServiceController@ajaxDelete' );
		
		// packet add like
		$route->get('/user-tool/manage-like','Frontend\ServiceController@manageLike');
		$route->get('/user-tool/manage-like/page/{page}','Frontend\ServiceController@manageLike');
		$route->get('/user-tool/add-like','Frontend\ServiceController@handleLike');
		$route->get('/user-tool/edit-like/{id}','Frontend\ServiceController@handleLike', [ 'id' => '\d+' ] );

		$route->post('/user-tool/validate-like','Frontend\ServiceController@validateLike' );
		$route->post('/user-tool/delete-like','Frontend\ServiceController@ajaxDelete' );

		// packet add share
		$route->get('/user-tool/manage-share','Frontend\ServiceController@manageShare');
		$route->get('/user-tool/manage-share/page/{page}','Frontend\ServiceController@manageShare');
		$route->get('/user-tool/add-share','Frontend\ServiceController@handleShare');
		$route->get('/user-tool/edit-share/{id}','Frontend\ServiceController@handleShare', [ 'id' => '\d+' ] );

		$route->post('/user-tool/validate-share','Frontend\ServiceController@validateShare' );
		$route->post('/user-tool/delete-share','Frontend\ServiceController@ajaxDelete' );
	}
}
