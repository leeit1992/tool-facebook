<?php

namespace app\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use App\Http\Components\Frontend\Controller as baseController;
use App\Model\TokenModel;
use App\Http\Components\ApiGetToken;
use Atl\Pagination\Pagination;

class TokenController extends baseController
{
    public function __construct()
    {
        parent::__construct();
        $this->userAccess();
        $this->mdToken = new TokenModel();
        $this->checkAdmin();
    }

    public function manageToken(Request $request, $type = 0, $page = null)
    {


        switch ($type) {
            case 1:
                $baseUrl    = url('/user-tool/manage-token/type/1/page/');
                $argsCondition = [ 'token_status' => 1 ];
                break;
            case 2:
                $baseUrl    = url('/user-tool/manage-token/type/2/page/');
                $argsCondition = [ 'token_status' => 2 ];
                break;
            default:
                $baseUrl    = url('/user-tool/manage-token/type/0/page/');
                $argsCondition = [];
                break;
        }

        $ofset      = 100;
        $totalRow   = $this->mdToken->getCount($argsCondition);
        
        $config     = $this->configPagination( $page, $ofset, $totalRow, $baseUrl );

        $pagination = new Pagination( $config );

        $listToken = $this->mdToken->getLinmit($pagination->getStartResult( $page ), $ofset);
        if( $type ) {
            $listToken = $this->mdToken->getLinmitbyType($pagination->getStartResult( $page ), $ofset, $type);
        }

        $countAll = $this->mdToken->getCount();
        $countTokenDie = $this->mdToken->getCount(['token_status' => 2]);
        $countTokenLive = $this->mdToken->getCount(['token_status' => 1]);    

        if ('live' == $request->get('filterToken')) {
            $listToken = $this->mdToken->getBy('token_status', 1);

            // ApiGetToken::getInstance()->checkToken();
            foreach ($listToken as $value) {
                // $infoToken = ApiGetToken::getInstance()->checkToken($value['token']);
                // var_dump($infoToken );
            }
        }

        if ('die' == $request->get('filterToken')) {
            $listToken = $this->mdToken->getBy('token_status', 2);
        }

        return $this->loadTemplate(
            'frontend/token/manageToken.tpl',
            [
                'listToken' => $listToken,
                'countAll' => $countAll,
                'countTokenDie' => $countTokenDie,
                'countTokenLive' => $countTokenLive,
                'pagination'   => $pagination->link(),
            ]
        );
    }

    public function facebookManage($id = null, $type = 0, $page = null)
    {

        switch ($type) {
            case 1:
                $baseUrl    = url('/user-tool/facebook-acc/type/1/page/');
                $argsCondition = [ 'token_status' => 1 ];
                break;
            case 2:
                $baseUrl    = url('/user-tool/facebook-acc/type/2/page/');
                $argsCondition = [ 'token_status' => 2 ];
                break;
            default:
                $baseUrl    = url('/user-tool/facebook-acc/type/0/page/');
                $argsCondition = [];
                break;
        }

        $ofset      = 50;
        $totalRow   = $this->mdToken->getCount($argsCondition);
        
        $config     = $this->configPagination( $page, $ofset, $totalRow, $baseUrl );

        $pagination = new Pagination( $config );

        $listFb = $this->mdToken->getLinmit($pagination->getStartResult( $page ), $ofset);
        if( $type ) {
            $listFb = $this->mdToken->getLinmitbyType($pagination->getStartResult( $page ), $ofset, $type);
        }

        return $this->loadTemplate(
            'frontend/token/manageAccFb.tpl',
            [
                'noticeAction' => Session()->getFlashBag()->get('facebookManage'),
                'listAccount' => $listFb,
                'manageAction' => $this->manageAction,
                'pagination'   => $pagination->link(),
                'tabActive' => $type,
                'infoAcc' => $this->mdToken->getBy('id', $id)
            ]
        );
    }

    public function validateAddFbAc(Request $request)
    {
        if (!empty($request->get('avt_user_name_fb')) && !empty($request->get('avt_password_fb'))) {
            $checkAcc = $this->mdToken->getBy('account', $request->get('avt_user_name_fb'));

            if (empty($checkAcc) && !$request->get('avt_acc_id')) {
                $getToken = ApiGetToken::getInstance()->getToken($request->get('avt_user_name_fb'), $request->get('avt_password_fb'));

                if (isset($getToken['access_token'])) {
                    $infoToken = ApiGetToken::getInstance()->checkToken($getToken['access_token']); 
                    $this->mdToken->save([
                        'account' => $request->get('avt_user_name_fb'),
                        'password' => $request->get('avt_password_fb'),
                        'token' => $getToken['access_token'],
                        'fb_id' => $getToken['uid'],
                        'token_status' => 1,
                        'gender' => isset( $infoToken['gender'] ) ? $infoToken['gender'] : '',
                        'birthday' => isset( $infoToken['birthday'] ) ? $infoToken['birthday'] : '',
                    ]);
                } else {
                    $err_mgs = $getToken['error_data'];
                    $err_arr = json_decode($err_mgs, true);
                    Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => $err_arr['error_message']]);
                    redirect(url('/user-tool/facebook-acc'));
                }
            } else {
                if (!$request->get('avt_acc_id')) {
                    Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => 'Tài khoản đã tồn tại.']);
                    redirect(url('/user-tool/facebook-acc'));
                }

                $getToken = ApiGetToken::getInstance()->getToken($request->get('avt_user_name_fb'), $request->get('avt_password_fb'));

                if (isset($getToken['access_token'])) {

                    $infoToken = ApiGetToken::getInstance()->checkToken($getToken['access_token']); 
                    $this->mdToken->save([
                        'account' => $request->get('avt_user_name_fb'),
                        'password' => $request->get('avt_password_fb'),
                        'token' => $getToken['access_token'],
                        'fb_id' => $getToken['uid'],
                        'token_status' => 1,
                        'gender' => isset( $infoToken['gender'] ) ? $infoToken['gender'] : '',
                        'birthday' => isset( $infoToken['birthday'] ) ? $infoToken['birthday'] : '',
                    ],$request->get('avt_acc_id'));
                    Session()->getFlashBag()->set('facebookManage', ['type' => true, 'notice' => 'Update thông tin thành công.']);

                }else{
                    Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => 'Không lấy được token cho tài khoản.']);
                }
            }

            
        } else {
            Session()->getFlashBag()->set('facebookManage', ['type' => false, 'notice' => 'Tài khoản và mật khẩu không được để trống.']);
        }

        redirect(url('/user-tool/facebook-acc'));
    }

    public function ajaxCheckToken(Request $request)
    {
        $infoData = $this->mdToken->getLinmit($request->get('start'), $request->get('limit'));

        foreach ($infoData as $value) {
            $infoToken = ApiGetToken::getInstance()->checkToken($value['token']);

            if (!isset($infoToken['id'])) {
                $this->mdToken->save([
                    'token_status' => 2,
                ], $value['id']);
            }else{
                 $this->mdToken->save([
                    'token_status' => 1,
                    'gender' => isset( $infoToken['gender'] ) ? $infoToken['gender'] : '',
                    'birthday' => isset( $infoToken['birthday'] ) ? $infoToken['birthday'] : '',
                ], $value['id']);
            }
        }

        $countTokenDie = $this->mdToken->getCount(['token_status' => 2]);
        $countTokenLive = $this->mdToken->getCount(['token_status' => 1]);

        echo json_encode([
            'start' => $request->get('start') + $request->get('limit'),
            'tokenDie' => $countTokenDie,
            'tokenLive' => $countTokenLive,
        ]);
    }

    public function uploadAccfb( Request $request ) {
        $notice = [];
        if ( !empty( $request->files->get('file') ) ) {
            $dir = FOLDER_UPLOAD . '/acc_fb';
            // Check if dir.
            if ( !is_dir( $dir ) ) {
                mkdir( $dir );
            }
            // Move to folder upload.
            $request->files->get('file')->move( $dir, 'file_acc_fb.txt' );

            $linkFile = FOLDER_UPLOAD . '/acc_fb/file_acc_fb.txt';
            $content =  file_get_contents( $linkFile );
            $listAcc = explode( "\n", $content );

            $argsList = [];
            foreach ($listAcc as $acc) {
                $accFB = explode( "|", $acc );
                $argsList[] = $accFB;
            }

            $notice['data']  = count($argsList);
        } else {
            $notice['data']  = false;
        }
        echo json_encode( $notice );
    }

    public function autoAccFb( Request $request ) {

        $linkFile = FOLDER_UPLOAD . '/acc_fb/file_acc_fb.txt';
        $argsList = [];

        if ( file_exists( $linkFile ) ) {
            $content =  file_get_contents( $linkFile );
            $listAcc = explode( "\n", $content );
            foreach ($listAcc as $acc) {
                $accFB = explode( "|", $acc );
                $argsList[] = $accFB;
            }
        }

        if( isset( $argsList[$request->get('start')] ) ) {
           
            $accInfo = $argsList[$request->get('start')];
            $checkExists = $this->mdToken->getBy('account', $accInfo[0]);

            if( empty( $checkExists ) ) {
                $getToken = ApiGetToken::getInstance()->getToken($accInfo[0], $accInfo[1]);
                if( isset( $getToken['access_token'] ) ){
                    $infoToken = ApiGetToken::getInstance()->checkToken($getToken['access_token']); 
                    $this->mdToken->save([
                        'account' => $accInfo[0], 
                        'password' => $accInfo[1], 
                        'token' => $getToken['access_token'], 
                        'fb_id' => $getToken['uid'], 
                        'token_status' => 1,
                        'gender' => isset( $infoToken['gender'] ) ? $infoToken['gender'] : '',
                        'birthday' => isset( $infoToken['birthday'] ) ? $infoToken['birthday'] : '',
                    ]);
                }else{
                    $this->mdToken->save([
                        'account' => $accInfo[0], 
                        'password' => $accInfo[1], 
                        'token_status' => 2,
                    ]);
                }
            } 
        }

        echo json_encode([
            'start' => $request->get('start') + $request->get('limit'),
        ]);

    }

    public function uploadTokenFb(Request $request){
        $notice = [];
        if ( !empty( $request->files->get('file') ) ) {
            $dir = FOLDER_UPLOAD . '/token_fb';
            // Check if dir.
            if ( !is_dir( $dir ) ) {
                mkdir( $dir );
            }
            // Move to folder upload.
            $request->files->get('file')->move( $dir, 'file_token.txt' );

            $linkFile = FOLDER_UPLOAD . '/token_fb/file_token.txt';
            $content =  file_get_contents( $linkFile );
            $listAcc = explode( "\n", $content );

            $argsList = [];
            foreach ($listAcc as $acc) {
                $accFB = explode( "|", $acc );
                $argsList[] = $accFB;
            }

            $notice['data']  = count($argsList);
        } else {
            $notice['data']  = false;
        }
        echo json_encode( $notice );
    }

    public function autoCheckTokenUpload(Request $request){
        $linkFile = FOLDER_UPLOAD . '/token_fb/file_token.txt';
        $argsList = [];

        if ( file_exists( $linkFile ) ) {
            $content =  file_get_contents( $linkFile );
            $listAcc = explode( "\n", $content );
            foreach ($listAcc as $acc) {
                $accFB = explode( "|", $acc );
                $argsList[] = $accFB;
            }
        }

        if( isset( $argsList[$request->get('start')] ) ) {

            $infoToken = ApiGetToken::getInstance()->checkToken($argsList[$request->get('start')][0]); 
   
            if( isset( $infoToken['id'] ) ) {
     
                $this->mdToken->save([
                        'token' => $argsList[$request->get('start')][0], 
                        'fb_id' => $infoToken['id'], 
                        'token_status' => 1,
                        'gender' => isset( $infoToken['gender'] ) ? $infoToken['gender'] : '',
                        'birthday' => isset( $infoToken['birthday'] ) ? $infoToken['birthday'] : '',
                    ]);
            } 
        }

        echo json_encode([
            'start' => $request->get('start') + $request->get('limit'),
        ]);
    }

    public function ajaxDeleteFacebook(Request $request){
        $id = $request->get('id');
        $this->mdToken->delete($id);
        echo json_encode( ['status' => true] );
    }
}
