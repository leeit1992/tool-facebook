<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Pagination\Pagination;
use Atl\Validation\Validation;
use App\Model\ServiceModel;
use App\Http\Components\Frontend\Controller as baseController;

class ServiceController extends baseController
{
    public function __construct(){
        parent::__construct();
        $this->userAccess();

        // Model data system.
        $this->mdService = new ServiceModel;
    }

    /**
     * Handle display manage users.
     * 
     * @param  int $page  Number of page.
     * @return string
     */
    public function managePacketService( $page = null ){
        $this->checkAdmin();
        $ofset                = 10;
        $config['pageStart']  = $page;
        $config['ofset']      = $ofset;
        $config['totalRow']   = $this->mdService->getCount();
        $config['baseUrl']    = url('/user-tool/manage-packet-service/page/');
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
            'frontend/service/manage-packet-service.tpl',
            [   
                'listPacketService'   => $this->mdService->getLinmit( $pagination->getStartResult( $page ), $ofset ),
                'pagination'   => $pagination->link(),
                'mdService'    => $this->mdService,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function handlePacketService( $id = null ){
        $this->checkAdmin();
        $infoPK   = [];

        // Load data user by action edit user.
        if( $id ) {
            $infoPK   = $this->mdService->getBy( 'id', $id );

            if( empty( $infoPK ) ) {
                redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
            }
        }
        // Load template
        return $this->loadTemplate(
            'frontend/service/add-packet-service.tpl',
            [
                'infoPK'   => !empty( $infoPK[0] ) ? $infoPK[0] : [],
                'actionName' => ( !$id ) ? 'Thêm' : 'Sửa',
                'mdService' => $this->mdService,
                'notify' => Session()->getFlashBag()->get('serviceFormNotice'),
                'self'   => $this,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function validatePacketService( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str($request->get('formData'), $formData);
            $notice    = [];

            $lastID = $this->mdService->save( 
                [
                    'number_like'    => $formData['avt_number_like'],
                    'number_comment' => $formData['avt_number_comment'],
                    'service_price'  => $formData['avt_service_price'],
                    'service_type'   => ''
                ],
                isset( $formData['avt_id'] ) ? $formData['avt_id'] : null
            );

            // Set notice success
            $nameAction = isset( $formData['avt_id'] ) ? 'Cập nhật' : 'Thêm mới';
                    Session()->getFlashBag()->set( 'serviceFormNotice', $nameAction . ' gói dịch vụ thành công' );

            // Set notice success
            $notice['id']      = $lastID;
            $notice['status']  = true;

            echo json_encode($notice);
        }   
    }

    public function ajaxDelete(Request $request){
        $id = $request->get('id');
        // Remove user
        $this->mdService->delete( $id );
        
        $message['status'] = true;
        if( empty( $request->get('id') ) ){
            $message['status'] = false;
        }

        echo json_encode( $message );
    }
}
