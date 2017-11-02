<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Pay implements RouterInterface
{
	private static $getInstance = null;

	public static function getInstance() {
        if ( !( self::$getInstance instanceof self ) ) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router( &$route ) {
		$route->get('/user-tool/add-pay','Frontend\PayController@handlePay');
		$route->get('/user-tool/edit-pay/{id}','Frontend\PayController@handlePay', [ 'id' => '\d+' ] );
		$route->get('/user-tool/manage-pay','Frontend\PayController@managePay');
		$route->get('/user-tool/manage-pay/page/{page}','Frontend\PayController@managePay');
		$route->get('/user-tool/ajax-manage-pay','Frontend\PayController@ajaxManagePay');

		$route->get('/user-tool/info-pay','Frontend\PayController@infoPay');

		$route->post('/user-tool/validate-pay','Frontend\PayController@validatePay' );
		$route->post('/user-tool/delete-pay','Frontend\PayController@ajaxDelete' );
	}
}
