<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Components\Frontend\Controller as baseController;

class ToolController extends baseController{
    
    public function __construct(){
		parent::__construct();
		// $this->userAccess();
	}

    public function upLikePost(){
    	return $this->loadTemplate('frontend/tool/like-post.tpl');
    }

    public function upLikePage(){
    	return $this->loadTemplate('frontend/tool/like-fanpage.tpl');
    }

    public function addComment(){
    	return $this->loadTemplate('frontend/tool/add-comment.tpl');
    }

    public function upShare(){
    	return $this->loadTemplate('frontend/tool/up-share.tpl');
    }

    public function upFollow(){
    	return $this->loadTemplate('frontend/tool/up-follow.tpl');
    }

    public function upLineAndDropHeart(){
    	return $this->loadTemplate('frontend/main.tpl');
    }
}