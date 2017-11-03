<?php
namespace App\Http\Controllers\Frontend;
use Atl\Foundation\Request;
use App\Http\Components\Frontend\Controller as baseController;
use App\Model\BuyModel;
use App\Model\ServiceModel;

class ToolController extends baseController{
    
    public function __construct(){
		parent::__construct();
		$this->userAccess();
        $this->mdBuy = new BuyModel();
        $this->mdService = new ServiceModel();

        
	}  

    public function upLikeComment(){
        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'service' === $service[0]['service_type'] ) {
                array_push( $services, $service[0] );
            }
        }
        return $this->loadTemplate('frontend/tool/like-comment.tpl', [ 'services' => $services ] );
    }

    public function upLikePost(){
        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            $service[0]['buy_id'] =  $item['id'];
            if ( 'like' === $service[0]['service_type'] ) {
                $services[] = $service[0];
            }
        }
    	return $this->loadTemplate('frontend/tool/like-post.tpl',
            [ 
                'services' => $services,
                'listPackageBy' => $listBuy,
                'mdService' => $this->mdService
            ]
        );
    }

    public function upLikePage(){
    	return $this->loadTemplate('frontend/tool/like-fanpage.tpl');
    }

    public function addComment(){
        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'comment' === $service[0]['service_type'] ) {
                array_push( $services, $service[0] );
            }
        }
    	return $this->loadTemplate('frontend/tool/add-comment.tpl', [ 'services' => $services ] );
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

    public function handleAction(Request $request){
        echo json_encode([
            'start' => $request->get('start') + $request->get('limit'),
        ]);
    }

    public function getInfoPacket( Request $request ) {

    }
}