<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Validation\Validation;
use Atl\Pagination\Pagination;
use App\Model\BuyModel;
use App\Model\ServiceModel;
use App\Model\UserModel;
use App\Http\Components\Frontend\Controller as baseController;

class BuyController extends baseController
{
    public function __construct() {
        parent::__construct();
        $this->userAccess();

        // Model data system.
        $this->mdBuy = new BuyModel;
        $this->mdService = new ServiceModel;
        $this->mdUser = new UserModel;
    }

    /**
     * Handle display manage buy.
     * 
     * @param  int $page  Number of page.
     * @return string
     */
    public function manageBuy( $page = null ) {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/manage-buy.tpl',
            [   
                'listBuy'      => $this->mdBuy->getByUser( Session()->get('avt_user_id'), 'auto'),
                'self'         => $this,
                'mdBuy'        => $this->mdBuy,
                'mdService'    => $this->mdService,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    /**
     * Handle display manage buff.
     * 
     * @param  int $page  Number of page.
     * @return string
     */
    public function manageBuff( $page = null ) {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/manage-buff.tpl',
            [   
                'listBuff'      => $this->mdBuy->getByUser( Session()->get('avt_user_id'), 'buff'),
                'self'         => $this,
                'mdBuy'        => $this->mdBuy,
                'mdService'    => $this->mdService,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function handleBuyService() {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/buy-service.tpl',
            [
                'self' => $this,
                'listService' => $this->mdService->getAllbyType( 'service' ),
                'notify' => Session()->getFlashBag()->get('buyFormNotice')
            ]
        );
    }

    public function validateBuyService( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            $user = $this->mdUser->getUserBy( 'id', Session()->get('avt_user_id') );
            $packet = $this->mdService->getBy( 'id', $formData['avt_buy_packet'] );
            $total_price = $packet[0]['service_price']*$formData['avt_buy_date'];
            if ( $user[0]['user_money'] >= $total_price) {
                $this->mdBuy->save( 
                    [
                        'buy_fb'       => $formData['avt_buy_fb'],
                        'buy_name'     => $formData['avt_buy_name'],
                        'buy_packet'   => $formData['avt_buy_packet'],
                        'buy_speed'    => $formData['avt_buy_speed'],
                        'buy_date'     => $formData['avt_buy_date'],
                        'buy_comment'  => $formData['avt_buy_comment'],
                        'buy_user'     => Session()->get('avt_user_id'),
                        'buy_used_day' => date("Y-m-d"),
                        'buy_run_day'  => 0,
                        'buy_type'     => 'auto',
                        'buy_created'  => date("Y-m-d H:i:s")
                    ],
                    null
                );
                $this->mdUser->save( 
                    [
                        'user_money' => $user[0]['user_money'] - $total_price
                    ],
                    Session()->get('avt_user_id')
                );

                $notice['status']  = true;
                Session()->getFlashBag()->set( 'buyFormNotice', 'Đăng kí dịch vụ thành công' );
            } else {
                $notice['status']  = false;
                $notice['message'][] = 'Tền trong tài khoản không đủ, vui lòng nạp thêm.';
            }
            
            echo json_encode( $notice );
        }   
    }

    public function handleBuyLike() {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/buy-like.tpl',
            [
                'self' => $this,
                'listLike' => $this->mdService->getAllbyType( 'like' ),
                'notify' => Session()->getFlashBag()->get('buyFormNotice')
            ]
        );
    }

    public function validateBuyLike( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            $user = $this->mdUser->getUserBy( 'id', Session()->get('avt_user_id') );
            $packet = $this->mdService->getBy( 'id', $formData['avt_buy_packet'] );
            $total_price = $packet[0]['service_price']*$formData['avt_buy_date'];
            if ( $user[0]['user_money'] >= $total_price) {
                $this->mdBuy->save( 
                    [
                        'buy_fb'      => $formData['avt_buy_fb'],
                        'buy_name'    => $formData['avt_buy_name'],
                        'buy_packet'  => $formData['avt_buy_packet'],
                        'buy_speed'   => $formData['avt_buy_speed'],
                        'buy_date'    => $formData['avt_buy_date'],
                        'buy_comment' => '',
                        'buy_user'    => Session()->get('avt_user_id'),
                        'buy_used_day' => date("Y-m-d"),
                        'buy_run_day'  => 0,
                        'buy_type'     => 'auto',
                        'buy_created' => date("Y-m-d H:i:s")
                    ],
                    null
                );
                $this->mdUser->save( 
                    [
                        'user_money' => $user[0]['user_money'] - $total_price
                    ],
                    Session()->get('avt_user_id')
                );

                $notice['status']  = true;
                Session()->getFlashBag()->set( 'buyFormNotice', 'Đăng kí gói like thành công' );
            } else {
                $notice['status']  = false;
                $notice['message'][] = 'Tền trong tài khoản không đủ, vui lòng nạp thêm.';
            }
            
            echo json_encode( $notice );
        }   
    }

    public function handleBuyComment() {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/buy-comment.tpl',
            [
                'self' => $this,
                'listComment' => $this->mdService->getAllbyType( 'comment ' ),
                'notify' => Session()->getFlashBag()->get('buyFormNotice')
            ]
        );
    }

    public function validateBuyComment( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            $user = $this->mdUser->getUserBy( 'id', Session()->get('avt_user_id') );
            $packet = $this->mdService->getBy( 'id', $formData['avt_buy_packet'] );
            $total_price = $packet[0]['service_price']*$formData['avt_buy_date'];
            if ( $user[0]['user_money'] >= $total_price) {
                $this->mdBuy->save( 
                    [
                        'buy_fb'      => $formData['avt_buy_fb'],
                        'buy_name'    => $formData['avt_buy_name'],
                        'buy_packet'  => $formData['avt_buy_packet'],
                        'buy_speed'   => $formData['avt_buy_speed'],
                        'buy_date'    => $formData['avt_buy_date'],
                        'buy_comment' => $formData['avt_buy_comment'],
                        'buy_user'    => Session()->get('avt_user_id'),
                        'buy_used_day' => date("Y-m-d"),
                        'buy_run_day'  => 0,
                        'buy_type'     => 'auto',
                        'buy_created' => date("Y-m-d H:i:s")
                    ],
                    null
                );
                $this->mdUser->save( 
                    [
                        'user_money' => $user[0]['user_money'] - $total_price
                    ],
                    Session()->get('avt_user_id')
                );

                $notice['status']  = true;
                Session()->getFlashBag()->set( 'buyFormNotice', 'Đăng kí gói comment thành công' );
            } else {
                $notice['status']  = false;
                $notice['message'][] = 'Tền trong tài khoản không đủ, vui lòng nạp thêm.';
            }
            
            echo json_encode( $notice );
        }   
    }

    public function handleBuyAddLike() {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/buy-add-like.tpl',
            [
                'self' => $this,
                'listAddLike' => $this->mdService->getAllbyType( 'up_like' ),
                'notify' => Session()->getFlashBag()->get('buyFormNotice')
            ]
        );
    }

    public function validateBuyAddLike( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            $user = $this->mdUser->getUserBy( 'id', Session()->get('avt_user_id') );
            $packet = $this->mdService->getBy( 'id', $formData['avt_buy_packet'] );
            $total_price = $packet[0]['service_price']*$formData['avt_buy_date'];
            if ( $user[0]['user_money'] >= $total_price) {
                $this->mdBuy->save( 
                    [
                        'buy_fb'      => '',
                        'buy_name'    => '',
                        'buy_packet'  => $formData['avt_buy_packet'],
                        'buy_speed'   => $formData['avt_buy_speed'],
                        'buy_date'    => $formData['avt_buy_date'],
                        'buy_comment' => '',
                        'buy_user'    => Session()->get('avt_user_id'),
                        'buy_used_day' => date("Y-m-d"),
                        'buy_run_day' => $this->mdService->getMetaData( $formData['avt_buy_packet'], 'like_number' ),
                        'buy_type'    => 'buff',
                        'buy_created' => date("Y-m-d H:i:s")
                    ],
                    null
                );
                $this->mdUser->save( 
                    [
                        'user_money' => $user[0]['user_money'] - $total_price
                    ],
                    Session()->get('avt_user_id')
                );

                $notice['status']  = true;
                Session()->getFlashBag()->set( 'buyFormNotice', 'Đăng kí gói tăng like thành công' );
            } else {
                $notice['status']  = false;
                $notice['message'][] = 'Tền trong tài khoản không đủ, vui lòng nạp thêm.';
            }
            
            echo json_encode( $notice );
        }   
    }

    public function handleBuyShare() {
        // Load template
        return $this->loadTemplate(
            'frontend/buy/buy-share.tpl',
            [
                'self' => $this,
                'listShare' => $this->mdService->getAllbyType( 'up_share' ),
                'notify' => Session()->getFlashBag()->get('buyFormNotice')
            ]
        );
    }

    public function validateBuyShare( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            $user = $this->mdUser->getUserBy( 'id', Session()->get('avt_user_id') );
            $packet = $this->mdService->getBy( 'id', $formData['avt_buy_packet'] );
            $total_price = $packet[0]['service_price']*$formData['avt_buy_date'];
            if ( $user[0]['user_money'] >= $total_price) {
                $this->mdBuy->save( 
                    [
                        'buy_fb'      => '',
                        'buy_name'    => '',
                        'buy_packet'  => $formData['avt_buy_packet'],
                        'buy_speed'   => $formData['avt_buy_speed'],
                        'buy_date'    => $formData['avt_buy_date'],
                        'buy_comment' => '',
                        'buy_user'    => Session()->get('avt_user_id'),
                        'buy_used_day' => date("Y-m-d"),
                        'buy_run_day'  => $this->mdService->getMetaData( $formData['avt_buy_packet'], 'share_number' ),
                        'buy_type'    => 'buff',
                        'buy_created' => date("Y-m-d H:i:s")
                    ],
                    null
                );
                $this->mdUser->save( 
                    [
                        'user_money' => $user[0]['user_money'] - $total_price
                    ],
                    Session()->get('avt_user_id')
                );

                $notice['status']  = true;
                Session()->getFlashBag()->set( 'buyFormNotice', 'Đăng kí gói tăng share thành công' );
            } else {
                $notice['status']  = false;
                $notice['message'][] = 'Tền trong tài khoản không đủ, vui lòng nạp thêm.';
            }
            
            echo json_encode( $notice );
        }   
    }

    public function ajaxDelete(Request $request){
        $id = $request->get('id');
        // Remove buy
        $this->mdBuy->delete( $id );

        $message['status'] = true;
        if( empty( $request->get('id') ) ){
            $message['status'] = false;
        }

        echo json_encode( $message );
    }

}
