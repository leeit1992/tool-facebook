<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Pagination\Pagination;
use Atl\Validation\Validation;
use App\Model\ServiceModel;
use App\Http\Components\ApiHandlePrice;
use App\Http\Components\Frontend\Controller as baseController;

class ServiceController extends baseController
{
    public function __construct(){
        parent::__construct();
        $this->userAccess();

        // Model data system.
        $this->mdService = new ServiceModel;
        $this->helpPrice  = ApiHandlePrice::getInstance();
    }

    /*
    *
    *  PACKET SERVICE
    *
    */

    public function managePacketService( $page = null ){
        $this->checkAdmin();
        $ofset      = 10;
        $totalRow   = $this->mdService->getCount( [ 'service_type' => 'service' ] );
        $baseUrl    = url('/user-tool/manage-packet-service/page/');
        $config     = $this->configPagination( $page, $ofset, $totalRow, $baseUrl );

        $pagination = new Pagination( $config );

        // Load template
        return $this->loadTemplate(
            'frontend/service/manage-packet-service.tpl',
            [   
                'listPacketService'   => $this->mdService->getLinmitbyType( $pagination->getStartResult( $page ), $ofset, 'service' ),
                'pagination'   => $pagination->link(),
                'mdService'    => $this->mdService,
                'helpPrice'    => $this->helpPrice,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function handlePacketService( $id = null ){
        $this->checkAdmin();
        $infoPK   = [];
        $metaData   = [];

        // Load data user by action edit user.
        if( $id ) {
            $infoPK   = $this->mdService->getBy( 'id', $id );
            $metaData   = $this->mdService->getAllMetaData( $id );
            if( empty( $infoPK ) ) {
                redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
            }
        }
        // Load template
        return $this->loadTemplate(
            'frontend/service/add-packet-service.tpl',
            [
                'infoPK'   => !empty( $infoPK[0] ) ? $infoPK[0] : [],
                'meta'   => $metaData,
                'actionName' => ( !$id ) ? 'Thêm' : 'Sửa',
                'input_filled' => ( $infoPK || $metaData ) ? 'md-input-filled' : '',
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
                    'service_name'  => $formData['avt_service_name'],
                    'service_price' => $this->helpPrice->convertPriceToInt( $formData['avt_service_price'] ),
                    'service_type'  => 'service'
                ],
                isset( $formData['avt_service_id'] ) ? $formData['avt_service_id'] : null
            );

            // Add meta data for service.
            $serviceMeta = [
                'service_post'    => $formData['avt_service_post'],
                'service_like'    => $formData['avt_service_like'],
                'service_comment' => $formData['avt_service_comment']
            ];
            // Loop add add | update meta data.
            foreach ($serviceMeta as $mtaKey => $metaValue) {
                $this->mdService->setMetaData( $lastID, $mtaKey, $metaValue );
            }

            // Set notice success
            $nameAction = isset( $formData['avt_service_id'] ) ? 'Cập nhật' : 'Thêm mới';
                    Session()->getFlashBag()->set( 'serviceFormNotice', $nameAction . ' gói dịch vụ thành công' );

            // Set notice success
            $notice['id']      = $lastID;
            $notice['status']  = true;

            echo json_encode($notice);
        }   
    }

    /*
    *
    *  PACKET LIKE
    *
    */
   
    public function managePacketLike( $page = null ){
        $this->checkAdmin();
        $ofset      = 10;
        $totalRow   = $this->mdService->getCount( [ 'service_type' => 'like' ] );
        $baseUrl    = url('/user-tool/manage-packet-like/page/');
        $config     = $this->configPagination( $page, $ofset, $totalRow, $baseUrl );

        $pagination = new Pagination($config);
        // Load template
        return $this->loadTemplate(
            'frontend/service/manage-packet-like.tpl',
            [   
                'listPacketLike'   => $this->mdService->getLinmitbyType( $pagination->getStartResult( $page ), $ofset, 'like' ),
                'pagination'   => $pagination->link(),
                'mdService'    => $this->mdService,
                'helpPrice'    => $this->helpPrice,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function handlePacketLike( $id = null ){
        $this->checkAdmin();
        $infoPacketLike   = [];
        $metaData   = [];

        // Load data user by action edit user.
        if( $id ) {
            $infoPacketLike   = $this->mdService->getBy( 'id', $id );
            $metaData   = $this->mdService->getAllMetaData( $id );
            if( empty( $infoPacketLike ) ) {
                redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
            }
        }
        // Load template
        return $this->loadTemplate(
            'frontend/service/add-packet-like.tpl',
            [
                'infoPacketLike'   => !empty( $infoPacketLike[0] ) ? $infoPacketLike[0] : [],
                'meta'   => $metaData,
                'actionName' => ( !$id ) ? 'Thêm' : 'Sửa',
                'input_filled' => ( $infoPacketLike || $metaData ) ? 'md-input-filled' : '',
                'mdService' => $this->mdService,
                'notify' => Session()->getFlashBag()->get('serviceFormNotice'),
                'self'   => $this,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function validatePacketLike( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str($request->get('formData'), $formData);
            $notice    = [];

            $lastID = $this->mdService->save( 
                [
                    'service_name'  => $formData['avt_service_name'],
                    'service_price' => $this->helpPrice->convertPriceToInt( $formData['avt_service_price'] ),
                    'service_type'  => 'like'
                ],
                isset( $formData['avt_service_id'] ) ? $formData['avt_service_id'] : null
            );

            // Add meta data for service.
            $serviceMeta = [
                'like_number' => $formData['avt_like_number'],
                'like_post'   => $formData['avt_like_post']
            ];
            // Loop add add | update meta data.
            foreach ($serviceMeta as $mtaKey => $metaValue) {
                $this->mdService->setMetaData( $lastID, $mtaKey, $metaValue );
            }

            // Set notice success
            $nameAction = isset( $formData['avt_service_id'] ) ? 'Cập nhật' : 'Thêm mới';
                    Session()->getFlashBag()->set( 'serviceFormNotice', $nameAction . ' gói dịch vụ thành công' );

            // Set notice success
            $notice['id']      = $lastID;
            $notice['status']  = true;

            echo json_encode($notice);
        }   
    }

    /*
    *
    *  PACKET COMMENT
    *
    */
   
    public function managePacketComment( $page = null ){
        $this->checkAdmin();
        $ofset      = 10;
        $totalRow   = $this->mdService->getCount( [ 'service_type' => 'comment' ] );
        $baseUrl    = url('/user-tool/manage-packet-comment/page/');
        $config     = $this->configPagination( $page, $ofset, $totalRow, $baseUrl );

        $pagination = new Pagination($config);
        // Load template
        return $this->loadTemplate(
            'frontend/service/manage-packet-comment.tpl',
            [   
                'listPacketComment'   => $this->mdService->getLinmitbyType( $pagination->getStartResult( $page ), $ofset, 'comment' ),
                'pagination'   => $pagination->link(),
                'mdService'    => $this->mdService,
                'helpPrice'    => $this->helpPrice,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function handlePacketComment( $id = null ){
        $this->checkAdmin();
        $infoPacketComment   = [];
        $metaData   = [];

        // Load data user by action edit user.
        if( $id ) {
            $infoPacketComment   = $this->mdService->getBy( 'id', $id );
            $metaData   = $this->mdService->getAllMetaData( $id );
            if( empty( $infoPacketComment ) ) {
                redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
            }
        }
        // Load template
        return $this->loadTemplate(
            'frontend/service/add-packet-comment.tpl',
            [
                'infoPacketComment'   => !empty( $infoPacketComment[0] ) ? $infoPacketComment[0] : [],
                'meta'   => $metaData,
                'actionName' => ( !$id ) ? 'Thêm' : 'Sửa',
                'input_filled' => ( $infoPacketComment || $metaData ) ? 'md-input-filled' : '',
                'mdService' => $this->mdService,
                'notify' => Session()->getFlashBag()->get('serviceFormNotice'),
                'self'   => $this,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    public function validatePacketComment( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str($request->get('formData'), $formData);
            $notice    = [];

            $lastID = $this->mdService->save( 
                [
                    'service_name'  => $formData['avt_service_name'],
                    'service_price' => $this->helpPrice->convertPriceToInt( $formData['avt_service_price'] ),
                    'service_type'  => 'comment'
                ],
                isset( $formData['avt_service_id'] ) ? $formData['avt_service_id'] : null
            );

            // Add meta data for service.
            $serviceMeta = [
                'comment_number' => $formData['avt_comment_number'],
                'comment_post'   => $formData['avt_comment_post']
            ];
            // Loop add add | update meta data.
            foreach ($serviceMeta as $mtaKey => $metaValue) {
                $this->mdService->setMetaData( $lastID, $mtaKey, $metaValue );
            }

            // Set notice success
            $nameAction = isset( $formData['avt_service_id'] ) ? 'Cập nhật' : 'Thêm mới';
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
        // Remove metadata
        $this->mdService->deleteMetaData( $id );

        $message['status'] = true;
        if( empty( $request->get('id') ) ){
            $message['status'] = false;
        }

        echo json_encode( $message );
    }
}
