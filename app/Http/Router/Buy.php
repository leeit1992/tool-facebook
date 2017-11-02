<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Buy implements RouterInterface
{
	private static $getInstance = null;

	public static function getInstance() {
        if ( !( self::$getInstance instanceof self ) ) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router( &$route ) {
		$route->get('/user-tool/buy-packet-like','Frontend\BuyController@handleBuyLike');
		$route->get('/user-tool/buy-packet-comment','Frontend\BuyController@handleBuyComment');

		$route->post('/user-tool/validate-buy-like','Frontend\BuyController@validateBuyLike' );
		$route->post('/user-tool/validate-buy-comment','Frontend\BuyController@validateBuyComment' );
	}
}