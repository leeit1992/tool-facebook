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
		$route->get('/user-tool/manage-buy','Frontend\BuyController@manageBuy');
		$route->get('/user-tool/manage-buff','Frontend\BuyController@manageBuff');
		$route->get('/user-tool/buy-packet-service','Frontend\BuyController@handleBuyService');
		$route->get('/user-tool/buy-packet-like','Frontend\BuyController@handleBuyLike');
		$route->get('/user-tool/buy-packet-comment','Frontend\BuyController@handleBuyComment');
		$route->get('/user-tool/buy-add-like','Frontend\BuyController@handleBuyAddLike');
		$route->get('/user-tool/buy-share','Frontend\BuyController@handleBuyShare');

		$route->post('/user-tool/validate-buy-service','Frontend\BuyController@validateBuyService' );
		$route->post('/user-tool/validate-buy-like','Frontend\BuyController@validateBuyLike' );
		$route->post('/user-tool/validate-buy-comment','Frontend\BuyController@validateBuyComment' );
		$route->post('/user-tool/validate-buy-add-like','Frontend\BuyController@validateBuyAddLike' );
		$route->post('/user-tool/validate-buy-share','Frontend\BuyController@validateBuyShare' );

		$route->post('/user-tool/delete-buy','Frontend\BuyController@ajaxDelete' );
		$route->post('/user-tool/delete-buff','Frontend\BuyController@ajaxDelete' );
	}
}
