<?php

namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use App\Http\Components\Frontend\Controller as baseController;
use App\Model\TokenModel;
use App\Http\Components\ApiGetToken;

class TokenController extends baseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->userAccess();
        $this->mdToken = new TokenModel;
    }

    public function manageToken(Request $request){

        $listToken = $this->mdToken->getAll();
        $countAll = $this->mdToken->getCount();
        $countTokenDie = $this->mdToken->getCount(['token_status' => 2]);
        $countTokenLive = $this->mdToken->getCount(['token_status' => 1]);

        if( 'live' == $request->get('filterToken') )
        {
            $listToken = $this->mdToken->getBy('token_status', 1);
        
            // ApiGetToken::getInstance()->checkToken();
            foreach ($listToken as $value) {
                // $infoToken = ApiGetToken::getInstance()->checkToken($value['token']);
                // var_dump($infoToken );
            }
        }

        if( 'die' == $request->get('filterToken') )
        {
            $listToken = $this->mdToken->getBy('token_status', 2);
        }

   
        return $this->loadTemplate(
            'frontend/token/manageToken.tpl',
            [
                'listToken' => $listToken,
                'countAll' => $countAll,
                'countTokenDie' => $countTokenDie,
                'countTokenLive' => $countTokenLive
            ]
        );
    }

    public function facebookManage()
    {   
        $listFb = $this->mdToken->getAll();
        return $this->loadTemplate(
            'frontend/token/manageAccFb.tpl',
            [
                'noticeAction' => Session()->getFlashBag()->get('facebookManage'),
                'listAccount' => $listFb
            ]
        );
    }

    public function validateAddFbAc(Request $request)
    {   
        if( !empty( $request->get('avt_user_name_fb') ) && !empty( $request->get('avt_password_fb') ) ) 
        {
            $checkAcc = $this->mdToken->getBy('account', $request->get('avt_user_name_fb'));

            if( empty( $checkAcc  ) && !$request->get('avt_acc_id')) {
                $getToken = ApiGetToken::getInstance()->getToken($request->get('avt_user_name_fb'), $request->get('avt_password_fb'));

                if( isset( $getToken['access_token'] ) ) {
                    $this->mdToken->save([
                        'account' => $request->get('avt_user_name_fb'),
                        'password' => $request->get('avt_password_fb'),
                        'token' => $getToken['access_token'],
                        'fb_id' => $getToken['uid'],
                        'token_status' => 1,
                    ]);
                }else{
                    $err_mgs = $getToken['error_data'];
                    $err_arr = json_decode($err_mgs, true);
                    Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => $err_arr['error_message']]);
                    redirect(url('/user-tool/facebook-acc'));
                }
                
            }else{
                if( !$request->get('avt_acc_id') ) {
                    Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => 'Tài khoản đã tồn tại.']);
                    redirect(url('/user-tool/facebook-acc'));
                } 

                $this->mdToken->save([
                    'account' => $request->get('avt_user_name_fb'),
                    'password' => $request->get('avt_password_fb'),
                ], $request->get('avt_acc_id'));
            }
            
            Session()->getFlashBag()->set('facebookManage', ['type' => true, 'notice' => 'Thêm thông tin thành công.']);
        }else{
            Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => 'Tài khoản và mật khẩu không được để trống.']);
        }
        
        redirect(url('/user-tool/facebook-acc'));
    }

    public function ajaxCheckToken(Request $request)
    {
        // var_dump($this->mdToken->getLinmit($request->get('start'), $request->get('limit')));
        echo json_encode([
            'start' => $request->get('start') + $request->get('limit')
        ]);
    }
}
