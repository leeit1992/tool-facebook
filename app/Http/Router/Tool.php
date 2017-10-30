<?php
namespace App\Http\Router;

use App\Http\Router\RouterInterface;

class Tool implements RouterInterface{

	private static $getInstance = null;

	public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
	} 

	public function router(&$route){
		$route->get('/user-tool/up-like','Frontend\ToolController@upLikePost');
		$route->get('/user-tool/up-lie-page','Frontend\ToolController@upLikePage');
		$route->get('/user-tool/add-comment','Frontend\ToolController@addComment');
		$route->get('/user-tool/up-share','Frontend\ToolController@upShare');
		$route->get('/user-tool/up-follow','Frontend\ToolController@upFollow');
		$route->get('/user-tool/up-like-and-heart','Frontend\ToolController@upLineAndDropHeart');




		$route->post('/user-tool/ajax-tool-action','Frontend\ToolController@handleAction');



		
	}

}