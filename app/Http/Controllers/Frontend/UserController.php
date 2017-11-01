<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Validation\Validation;
use App\Model\UserModel;
use Atl\Pagination\Pagination;
use App\Http\Components\Frontend\Controller as baseController;
use App\Http\Components\ApiHandlePrice;

class UserController extends baseController
{
	public function __construct(){
		parent::__construct();
		$this->userAccess();
		
		// Model data system.
		$this->mdUser = new UserModel;
		$this->helpPrice  = ApiHandlePrice::getInstance();
	}

	/**
	 * Handle display manage users.
	 * 
	 * @param  int $page  Number of page.
	 * @return string
	 */
	public function manageUsers( $page = null ){
		$this->checkAdmin();
		$ofset                = 10;
        $config['pageStart']  = $page;
        $config['ofset']      = $ofset;
        $config['totalRow']   = $this->mdUser->count();
        $config['baseUrl']    = url('/user-tool/manage-user/page/');
        $config['classes']    = 'uk-pagination uk-margin-medium-top';
        $config['nextLink']   = '<i class="uk-icon-angle-double-right"></i>';
        $config['prevLink']   = '<i class="uk-icon-angle-double-left"></i>';
        $config['tagOpenPageCurrent']   = '<li class="uk-active"><span>';
        $config['tagClosePageCurrent']  = '<span></li>';
        $config['tagOpen']    = '';
        $config['tagClose']   = '';

        $pagination           = new Pagination($config);

        // Load template
		return $this->loadTemplate(
			'frontend/user/manageUser.tpl',
			[	
				'listUser'   => $this->mdUser->getUserLimit( $pagination->getStartResult( $page ), $ofset ),
				'pagination' => $pagination->link(),
				'mdUser'     => $this->mdUser,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
			]
		);
	}

	/**
	 * Handle display add | edit user.
	 * 
	 * @param  int $id ID of user edit.
	 * @return string
	 */
	public function handleUser( $id = null ) {
		if ( !$id ) {
			$this->checkAdmin();
		}
		$infoUser   = [];
		$metaData   = [];
		$userSocial = [];

		// Load data user by action edit user.
		if( $id ) {
			$infoUser   = $this->mdUser->getUserBy( 'id', $id );
			$metaData   = $this->mdUser->getAllMetaData( $id );
			$userSocial = ( array ) json_decode( $metaData['user_social'] );

			if( empty( $infoUser ) ) {
				redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
			}
		}

		// Load template
		return $this->loadTemplate(
			'frontend/user/addUser.tpl',
			[
				'user'   => !empty( $infoUser[0] ) ? $infoUser[0] : array(),
				'meta'   => $metaData,
				'actionName' => ( !$id ) ? 'Created User' : $infoUser[0]['user_name'],
				'social' => $userSocial,
				'mdUser' => $this->mdUser,
				'notify' => Session()->getFlashBag()->get('userFormNotice'),
				'self'   => $this,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
			]
		);
	}

	/**
	 * Handle validate form user.
	 * 
	 * @param  Request $request Request POST | GET method
	 * @return void.
	 */
	public function validateUser(Request $request){
		if( !empty( $request->get('formData') ) ) {
			parse_str($request->get('formData'), $formData);
			$notice    = array();
			$validator = new Validation;
			// Check validate user.
			$validator->add(
				[
					'atl_user_email:Email'     => 'required | minlength(6)',
					'atl_user_pass:Password'   => 'required | minlength(6)',
					'atl_user_cf_pass:Confirm' => 'required | minlength(6) | match(item=atl_user_pass)',
				]
			);
			if ( $validator->validate( $formData ) ) {
				// Save user.
				$emailExists = $this->mdUser->getUserBy( 'user_email', $formData['atl_user_email'] );
				$emailExists = isset( $formData['atl_user_id'] ) ? array() : $emailExists;

				if( empty( $emailExists ) ) {
					/**
					 * Insert | Update user.
					 */
					$lastID = $this->mdUser->save( 
						[
							'user_name'         => empty( $formData['atl_user_name'] ) ? $formData['atl_user_email'] : $formData['atl_user_name'],
							'user_password'     => $this->isValidMd5($formData['atl_user_pass']) ? $formData['atl_user_pass'] : md5( $formData['atl_user_pass'] ),
							'user_email'        => $formData['atl_user_email'],
							'user_registered'   => date("Y-m-d H:i:s"),
							'user_status'       => !empty( $formData['atl_user_status'] ) ? $formData['atl_user_status'] : 0,
							'user_display_name' => empty( $formData['atl_user_name'] ) ? $formData['atl_user_email'] : $formData['atl_user_name'],
							'user_money'        => $this->helpPrice->convertPriceToInt( $formData['atl_user_money'] )

						],
						isset( $formData['atl_user_id'] ) ? $formData['atl_user_id'] : null
					);
					
					/**
					 * Add meta data for user.
					 */
					$userMeta = [
						'user_birthday' => $formData['atl_user_birthday'],
						'user_address'  => $formData['atl_user_address'],
						'user_moreinfo' => $formData['atl_user_moreinfo'],
						'user_phone'    => $formData['atl_user_phone'],
						'user_social'   => $formData['atl_user_social'],
						'user_role'     => $formData['atl_user_role'],

					];
					// Loop add add | update meta data.
					foreach ($userMeta as $mtaKey => $metaValue) {
						$this->mdUser->setMetaData( $lastID, $mtaKey, $metaValue );
					}

					// Set notice success
					$nameAction = isset( $formData['atl_user_id'] ) ? 'Update' : 'Create';
					Session()->getFlashBag()->set( 'userFormNotice', $nameAction . ' account successfully' );

					// Set notice success
					$notice['id']      = $lastID;
					$notice['status']  = true;
				}else{
					// Set notice error
					$notice['status']    = false;
					$notice['message'][] = 'This account already exists.';
				}
			} else {
				$notice['status']  = false;
				foreach ($validator->getAllErrors() as $value) {
					$notice['message'][] = $value;
				}
			}
			echo json_encode($notice);
		}	
	}

	/**
	 * Handle delete user with ajax
	 * 
	 * @param  Request $request POST | GET
	 * @return void
	 */
	public function ajaxDelete(Request $request){
		$id = $request->get('id');
		// Remove user
		$this->mdUser->delete( $id );
		// Remove metadata
		$this->mdUser->deleteMetaData( $id );
		
		$message['status'] = true;
		if( empty( $request->get('id') ) ){
			$message['status'] = false;
		}

		echo json_encode(
			$message
		);
	}
}
