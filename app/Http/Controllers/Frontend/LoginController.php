<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Validation\Validation;
use App\Http\Components\Frontend\Controller as baseController;
use App\Model\UserModel;

class LoginController extends baseController
{
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if (true === Session()->has('avt_user_id')) {
            redirect(url('/user-tool'));

            return true;
        }

        // Load layout.
        return view(
            'frontend/login.tpl',
            [
                'noticeLogin' => Session()->getFlashBag()->get('loginError'),
            ]
        );
    }

    public function checkLogin( Request $request ) {
        $validator = new Validation();
        $validator->add(
            [
                'atl_login_acc:Account' => 'email | required | minlength(6)',
                'atl_login_pass:Password' => 'required | minlength(4)',
            ]
        );

        $error = [];

        if ($validator->validate($_POST)) {
            $user = new UserModel();

            $checkUser = $user->checkLogin($request->get('atl_login_acc'), md5($request->get('atl_login_pass')));
            if (!empty($checkUser)) {
                Session()->set('avt_user_id', $checkUser[0]['id']);
                Session()->set('avt_user_name', $checkUser[0]['user_name']);
                Session()->set('avt_user_email', $checkUser[0]['user_email']);
                Session()->set('avt_user_meta',  $user->getAllMetaData($checkUser[0]['id']));
                Session()->set('avt_user_role',  $user->getMetaData( $checkUser[0]['id'], 'user_role' ));
                redirect(url('/user-tool'));
            } else {
                $error[] = 'error';
            }
        } else {
            $error[] = 'error';
        }
        
        if (!empty($error)) {
            Session()->getFlashBag()->set('loginError', 'Account or Password not match !');
            redirect(url('/atl-login'));
        }
    }
    public function logout() {
        Session()->remove('avt_user_id');
        Session()->remove('avt_user_name');
        Session()->remove('avt_user_email');

        redirect(url('/atl-login'));
    }
}
