<?php
namespace App\Http\Controllers\Frontend;
use Atl\Foundation\Request;
use App\Http\Components\Frontend\Controller as baseController;
use App\Model\BuyModel;
use App\Model\ServiceModel;
use App\Model\TokenModel;

class ToolController extends baseController
{
    public function __construct(){
		parent::__construct();
		$this->userAccess();
        $this->mdBuy = new BuyModel();
        $this->mdService = new ServiceModel();
        $this->mdToken = new TokenModel();
	}  

    public function upLikeComment(){
        /*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
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

    public function upAddLike(){
        /*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
        foreach ($listBuy as $item) {
            $packetS = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'up_like' === $packetS[0]['service_type'] ) {
                array_push( $userTools, $packetS[0]['service_type'] );
                break;
            }
        }
        if ( empty( $userTools ) ) {
            redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
        }

        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'up_like' === $service[0]['service_type'] ) {
                $date = $this->countDay( $item['buy_created'], date("Y-m-d H:i:s") );
                if ( $date < $item['buy_date']*30 ) {
                    $services[] = $item;
                }
            }
        }
        return $this->loadTemplate('frontend/tool/up-like.tpl',
            [ 
                'services' => $services,
                'mdService' => $this->mdService
            ]
        );
    }

    public function upShare(){
    	/*
         * check user have register package
         */
        $userTools = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
        foreach ($listBuy as $item) {
            $packetS = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'up_share' === $packetS[0]['service_type'] ) {
                array_push( $userTools, $packetS[0]['service_type'] );
                break;
            }
        }
        if ( empty( $userTools ) ) {
            redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
        }

        $services = [];
        $listBuy = $this->mdBuy->getBy( 'buy_user', Session()->get('avt_user_id') );
        foreach ($listBuy as $item) {
            $service = $this->mdService->getBy( 'id', $item['buy_packet'] );
            if ( 'up_share' === $service[0]['service_type'] ) {
                $date = $this->countDay( $item['buy_created'], date("Y-m-d H:i:s") );
                if ( $date < $item['buy_date']*30 ) {
                    $services[] = $item;
                }
            }
        }
        return $this->loadTemplate('frontend/tool/up-share.tpl',
            [ 
                'services' => $services,
                'mdService' => $this->mdService
            ]
        );
    }

    public function upFollow(){
    	return $this->loadTemplate('frontend/tool/up-follow.tpl');
    }

    public function upLineAndDropHeart(){
    	return $this->loadTemplate('frontend/main.tpl');
    }

    public function getPacketLike( Request $request ) {
        $data = [];
        $data['status'] = true;

        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedTime = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'like_number' );
        $data['speedTime'] = $speedTime;

        $dateCurrent = date("Y-m-d");
        if ( $infoBuy[0]['buy_used_day'] === $dateCurrent ) {
            $limitPost = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'post_limit' );
            if ( $infoBuy[0]['buy_run_day'] >= $limitPost ) {
                $data['status'] = false;
            }
        }
        echo json_encode( $data );
    }

    public function getPacketComment( Request $request ) {
        $data = [];
        $data['status'] = true;

        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedTime = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'comment_number' );
        $data['speedTime'] = $speedTime;

        $dateCurrent = date("Y-m-d");
        if ( $infoBuy[0]['buy_used_day'] === $dateCurrent ) {
            $limitPost = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'post_limit' );
            if ( $infoBuy[0]['buy_run_day'] >= $limitPost ) {
                $data['status'] = false;
            }
        }

        echo json_encode( $data );
    }

    public function getPacketLikeComment( Request $request ) {
        $data = [];
        $data['status'] = true;

        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $speedLike = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'service_like' );
        $data['speedLike'] = $speedLike;

        $speedComment = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'service_comment' );
        $data['speedComment'] = $speedComment;

        $dateCurrent = date("Y-m-d");
        if ( $infoBuy[0]['buy_used_day'] === $dateCurrent ) {
            $limitPost = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'post_limit' );
            if ( $infoBuy[0]['buy_run_day'] >= $limitPost ) {
                $data['status'] = false;
            }
        }
        
        echo json_encode( $data );
    }

    public function getUpLike( Request $request ) {
        $data = [];

        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $data['total'] = $infoBuy[0]['buy_run_day'];

        echo json_encode( $data );
    }

    public function getUpShare( Request $request ) {
        $data = [];

        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );
        $data['numberS'] = $infoBuy[0]['buy_speed']*1000;

        $data['total'] = $infoBuy[0]['buy_run_day'];

        echo json_encode( $data );
    }

    public function updateCountUsing( Request $request ) {
        $data = [];
        $infoBuy = $this->mdBuy->getBy( 'id', $request->get('id') );

        $limitPost = $this->mdService->getMetaData( $infoBuy[0]['buy_packet'], 'post_limit' );
        $buyDate = $infoBuy[0]['buy_used_day'];
        $dateCurrent = date("Y-m-d");
        if ( $buyDate === $dateCurrent && $infoBuy[0]['buy_run_day'] >= $limitPost) {
            $data['status'] = false;
        } else {
            if ( $buyDate !== $dateCurrent ) {
                $usedDate = $dateCurrent;
                $runDay = 1;
            } else {
                $usedDate = $buyDate;
                $runDay = $infoBuy[0]['buy_run_day'] + 1;
            }
            $this->mdBuy->save( 
                [
                    'buy_used_day' => $usedDate,
                    'buy_run_day'  => $runDay
                ],
                $request->get('id')
            );
            $data['status'] = true;
        }
        echo json_encode( $data );
    }
    //1138030233005264
    public function handleAction(Request $request){
        $tokenRand = $this->mdToken->queryRand();
        $get = '';
        switch ($request->get('type')) {
            case 'likePost':
               $get = @file_get_contents('https://graph.facebook.com/'.$request->get('objectId').'/likes?method=POST&access_token='.$tokenRand[0]['token']);
            break;

            case 'comment':
                if( $request->get('packageId') ) {
                    $infoBuy = $this->mdBuy->getBy('id', $request->get('packageId'));
                    $listComment = explode( "\n", $infoBuy[0]['buy_comment'] );
                    
                    $k = array_rand($listComment);
                    $comment = $listComment[$k];
                    $comment = str_replace(' ', '%20', $comment);
                    $get = @file_get_contents('https://graph.facebook.com/'.$request->get('objectId').'/comments?method=POST&message='.$comment.'&access_token='.$tokenRand[0]['token']);
                }
            break;

            case 'upLike':
                $get = @file_get_contents('https://graph.facebook.com/'.$request->get('objectId').'/likes?method=POST&access_token='.$tokenRand[0]['token']);
                $infoBuy = $this->mdBuy->getBy('id', $request->get( 'id' ));
                $this->mdBuy->save( 
                    [
                        'buy_run_day'  => $infoBuy[0]['buy_run_day'] - 1,
                    ],
                    $request->get( 'id' )
                );
            break;

            case 'upShare':
                $get = @file_get_contents('https://graph.facebook.com/'.$request->get('objectId').'/sharedposts?method=POST&sharedposts='.$tokenRand[0]['fb_id'].'&access_token='.$tokenRand[0]['token']);
                $infoBuy = $this->mdBuy->getBy('id', $request->get( 'id' ));
                $numberLike = $infoBuy[0]['buy_run_day'] - 1;
                $this->mdBuy->save( 
                    [
                        'buy_run_day'  => $numberLike,
                    ],
                    $request->get( 'id' )
                );
            break;
        }
        echo json_encode([
            'start' => $request->get('start') + $request->get('limit'),
            'status' => $get
        ]);
    }
}