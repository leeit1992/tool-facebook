<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Components\Frontend\Controller as baseController;

class MainController extends baseController{
    
    public function __construct(){
		parent::__construct();
		// $this->userAccess();
	}

    public function index(){
    	return $this->loadTemplate('frontend/main.tpl');
    }
}