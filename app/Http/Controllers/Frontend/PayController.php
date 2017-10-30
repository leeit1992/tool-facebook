<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Validation\Validation;
use Atl\Pagination\Pagination;
use App\Model\PayModel;
use App\Http\Components\Frontend\Controller as baseController;

class PayController extends baseController
{
    public function __construct() {
        parent::__construct();
        $this->userAccess();

        // Model data system.
        $this->mdPay = new PayModel;
    }

    /**
     * Handle display manage pays.
     * 
     * @param  int $page  Number of page.
     * @return string
     */
    public function managePay( $page = null ) {
        $ofset                = 10;
        $config['pageStart']  = $page;
        $config['ofset']      = $ofset;
        $config['totalRow']   = $this->mdPay->getCount();
        $config['baseUrl']    = url('/user-tool/manage-pay/page/');
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
            'frontend/pay/manage-pay.tpl',
            [   
                'listPay'      => $this->mdPay->getLinmit( $pagination->getStartResult( $page ), $ofset ),
                'pagination'   => $pagination->link(),
                'mdPay'        => $this->mdPay,
                'addButton'    => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    /**
     * Handle display add | edit pay.
     * 
     * @param  int $id ID of pay edit.
     * @return string
     */
    public function handlePay( $id = null ) {
        $infoUser   = [];
        if( $id ) {
            $infoPay   = $this->mdPay->getBy( 'id', $id );
            if( empty( $infoPay ) ) {
                redirect( url('/user-tool/error-404?url=' . $_SERVER['REDIRECT_URL']) );
            }
        }

        // Load template
        return $this->loadTemplate(
            'frontend/pay/add-pay.tpl',
            [
                'pay'   => !empty( $infoPay[0] ) ? $infoPay[0] : [],
                'actionName' => ( !$id ) ? 'Created Pay' : 'Info '. $infoPay[0]['bank_user_name'],
                'mdPay' => $this->mdPay,
                'notify' => Session()->getFlashBag()->get('payFormNotice'),
                'self'   => $this,
                'addButton' => $this->addButton,
                'manageAction' => $this->manageAction
            ]
        );
    }

    /**
     * Handle validate form pay.
     * 
     * @param  Request $request Request POST | GET method
     * @return void.
     */
    public function validatePay( Request $request ) {
        if( !empty( $request->get('formData') ) ) {
            parse_str( $request->get('formData'), $formData );

            /**
             * Insert | Update pay.
             */
            $lastID = $this->mdPay->save( 
                [
                    'bank_name'      => $formData['avt_bank_name'],
                    'bank_user_name' => $formData['avt_bank_user_name'],
                    'bank_number'    => $formData['avt_bank_number'],
                    'bank_address'   => $formData['avt_bank_address']
                ],
                isset( $formData['atl_pay_id'] ) ? $formData['atl_pay_id'] : null
            );

            // Set notice success
            $nameAction = isset( $formData['atl_pay_id'] ) ? 'Update' : 'Create';
            Session()->getFlashBag()->set( 'payFormNotice', $nameAction . ' pay bank successfully' );

            // Set notice success
            $notice['id']      = $lastID;
            $notice['status']  = true;

            echo json_encode( $notice );
        }   
    }

    /**
     * Handle filter pay
     * 
     * @param  Request $request POST | GET
     * @return json
     */
    public function ajaxManagePay(Request $request){
        $output = '';
        /**
         * Check type get list pay manage.
         */
        switch ( $request->get('getBy') ) {
            case 'search':
                ob_start();
                $output .= View(
                    'frontend/pay/manage-payJs.tpl',
                    [
                        'pays'  => $this->mdPay->searchBy( $request->get('keyup') )
                    ]
                );
                $output .= ob_get_clean();
                break;
        }
        echo json_encode( [ 'output' => $output ] );
    }

    /**
     * Handle delete pay with ajax
     * 
     * @param  Request $request POST | GET
     * @return void
     */
    public function ajaxDelete( Request $request ) {
        $id = $request->get('id');
        // Remove pay
        $this->mdPay->delete( $id );
        
        $message['status'] = true;
        if( empty( $request->get('id') ) ){
            $message['status'] = false;
        }

        echo json_encode( $message );
    }
}
