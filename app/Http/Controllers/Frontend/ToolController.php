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
        /*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $packetS = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'service' === $packetS[0]['service_type'] ) {
                array_push( $userTools, $packetS[0]['service_type'] );
                break;
            }
        }
        if ( empty( $userTools ) ) {
            redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
        }
        
        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'service' === $service[0]['service_type'] ) {
                $date = $this->countDay( $item['buy_created'], date("Y-m-d H:i:s") );
                if ( $date < $item['buy_date']*30 ) {
                    $services[] = $item;
                }
            }
        }
        return $this->loadTemplate('frontend/tool/like-comment.tpl',
            [ 
                'services' => $services,
                'mdService' => $this->mdService
            ]
        );
    }

    public function upLikePost(){
        /*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $packetS = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'like' === $packetS[0]['service_type'] ) {
                array_push( $userTools, $packetS[0]['service_type'] );
                break;
            }
        }
        if ( empty( $userTools ) ) {
            redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
        }

        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'like' === $service[0]['service_type'] ) {
                $date = $this->countDay( $item['buy_created'], date("Y-m-d H:i:s") );
                if ( $date < $item['buy_date']*30 ) {
                    $services[] = $item;
                }
            }
        }
    	return $this->loadTemplate('frontend/tool/like-post.tpl',
            [ 
                'services' => $services,
                'mdService' => $this->mdService
            ]
        );
    }

    public function upLikePage(){
    	return $this->loadTemplate('frontend/tool/like-fanpage.tpl');
    }

    public function addComment(){
        /*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $packetS = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'comment' === $packetS[0]['service_type'] ) {
                array_push( $userTools, $packetS[0]['service_type'] );
                break;
            }
        }
        if ( empty( $userTools ) ) {
            redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
        }

        // get list packaget comment
        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('atl_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'comment' === $service[0]['service_type'] ) {
                $date = $this->countDay( $item['buy_created'], date("Y-m-d H:i:s") );
                if ( $date < $item['buy_date']*30 ) {
                    $services[] = $item;
                }
            }
        }
        return $this->loadTemplate('frontend/tool/add-comment.tpl',
            [ 
                'services' => $services,
                'mdService' => $this->mdService
            ]
        );
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

    public function getPacketLike( Request $request ) {
        $data = [];
        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedTime = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'like_number' );
        $data['speedTime'] = $speedTime;
        
        echo json_encode( $data );
    }
    public function getPacketComment( Request $request ) {
        $data = [];
        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedTime = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'comment_number' );
        $data['speedTime'] = $speedTime;
        echo json_encode( $data );
    }
    public function getPacketLikeComment( Request $request ) {
        $data = [];
        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedLike = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'service_like' );
        $data['speedLike'] = $speedLike;

        $speedComment = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'service_comment' );
        $data['speedComment'] = $speedComment;
        echo json_encode( $data );
    }
}