<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use App\Http\Components\Frontend\Controller as baseController;

class MainController extends baseController{
    
    public function __construct(){
		parent::__construct();
		$this->userAccess();
	}

    public function index(){
    	return $this->loadTemplate('frontend/main.tpl');
    }

    /**
	 * Handle set page 404
	 */
	public function page404( Request $request ){
		return View(
			'frontend/error404.tpl',
			[	
				'url' => $request->get('url'),
				'redirect' => url('/user-tool')
			]
		);
	}
}