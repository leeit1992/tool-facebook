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

    public function handlePacketService( $id = null ){

        // Load template
        return $this->loadTemplate(
            'frontend/service/add-packet-service.tpl',
            [
                'notify' => Session()->getFlashBag()->get('serviceFormNotice'),
                'self'   => $this,
                //'addButton' => $this->addButton,
                //'manageAction' => $this->manageAction
            ]
        );
    }

    public function validatePacketService( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str($request->get('formData'), $formData);
            $notice    = [];

            $this->mdService->save( 
                [
                    'number_like'    => $formData['avt_number_like'],
                    'number_comment' => $formData['avt_number_comment'],
                    'service_price'  => $formData['avt_service_price'],
                    'service_type'   => ''
                ],
                null
            );

            // Set notice success
            Session()->getFlashBag()->set( 'serviceFormNotice', 'Create packet service successfully' );

            // Set notice success
            $notice['status']  = true;

            echo json_encode($notice);
        }   
    }
}
