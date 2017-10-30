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
		$route->get('/user-tool/add-packet-service','Frontend\ServiceController@handlePacketService');

		$route->post('/user-tool/validate-packet-service','Frontend\ServiceController@validatePacketService' );
	}
}
