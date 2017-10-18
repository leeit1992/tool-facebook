<?php
namespace App\Http\Components\Backend;

use App\Model\UserModel;
use App\Model\MailboxModel;
use App\Model\BookingModel;
use App\Model\OfficeModel;
use App\Model\TourModel;
use App\Model\IntineraryModel;
use App\Model\CarModel;
use App\Model\CruiseModel;
use App\Model\DriverModel;
use App\Model\GuiderModel;
use App\Model\OtherServiceModel;
use App\Model\AccomodationModel;
use App\Http\Components\ApiMailbox;
use App\Http\Components\ApiHandlePrice;
use App\Http\Components\ApiCar as ApiCar;

class AdminNotifiedBooking
{   
    private static $getInstance = null;
    public static $control = null;
    public static $args = null;

    public static function getInstance( $controller, $args )
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        self::$control = $controller;
        self::$args = $args;
        return self::$getInstance;
    } 

    public function render(){
        $mdUser = new UserModel;
        $mdBooking = new BookingModel;
        $mdCruise = new CruiseModel;
        $mdMailbox = new MailboxModel;
        $mdOffice = new OfficeModel;
        $mdCar = new CarModel;
        $mdGuider = new GuiderModel;
        $mdIntinerary = new IntineraryModel;
        $mdDriver = new DriverModel;
        $mdOtherService = new OtherServiceModel;
        $mdAccomodation = new AccomodationModel;
        $helpPrice  = ApiHandlePrice::getInstance();
        $apiMailbox = ApiMailbox::getInstance();
        $mdTour = new TourModel;
        $id = isset( self::$args['itemId'] ) ? self::$args['itemId'] : '';
        if ($id) {
            // Get info booking
            $infoBooking = $mdBooking->getinfoBooking( $id );
        }
        // get info customer
        $customer = isset($infoBooking['booking_customer']) ? json_decode($infoBooking['booking_customer'], true) : array();
        // get info meta Booking
        $metaBooking = isset($infoBooking['booking_info']) ? json_decode($infoBooking['booking_info'], true) : array();
        // get info deposit
        $deposit = isset($infoBooking['booking_deposit']) ? json_decode($infoBooking['booking_deposit'], true) : array();
        //get info TOUR
        $tour = $mdTour->getTourBy('id', $infoBooking['booking_tour_id']);

        //get info sservice booking TOUR
        $services = isset($infoBooking['booking_service']) ? json_decode($infoBooking['booking_service'], true) : array();

        //caculator total price service
        $priceTotalServ = 0;
        if (is_array($services) || is_object($services))
        {
            foreach ( $services as  $items) {
                foreach ($items as $key => $value) {
                    if (isset($value['priceMain']) && ($value['priceMain'] !== $value['price'])) {
                        $priceTotalServ += $value['priceMain'];
                    }else{
                        $priceTotalServ += $value['price'];
                    }
                }
            }
        }

        // get list Intinerary
        $listInti = $mdIntinerary->getIntineraryBy('inti_tou_id', $infoBooking['booking_tour_id']);
        $argsIDInti = [];
        foreach ($listInti as $items) {
            $argsIDInti[] = $items['id'];
        }
        // get list Intinerary and meta
        $listIntinerary = $mdIntinerary->getInfoListIntinenrary($argsIDInti);

        //caculator total price Intinerary
        $priceTotalInti = 0;
        foreach ($listIntinerary as $inti) {
            if (is_array($inti) || is_object($inti))
            {
                foreach (json_decode($inti['inti_service'], true) as  $items) {
                    foreach ($items as $key => $value) {
                        if (isset($value['priceMain']) && ($value['priceMain'] !== $value['price'])) {
                            $priceTotalInti += $value['priceMain'];
                        }else{
                            $priceTotalInti += $value['price'];
                        }
                    }
                }
            }
        }
    	?>
            <div class="uk-grid uk-margin-top">
                <?php 
                    View(
                        'backend/layout/booking/basicBooking.tpl',
                        [ 
                            'infoBooking' => $infoBooking,
                            'customer' => $customer,
                            'mdOffice' => $mdOffice,
                            'metaBooking' => $metaBooking
                        ]
                    ); 
                ?>
                <div class="uk-width-medium-1-1 uk-margin-top">
                    <form id="page-admin-price-booking-form" class="atl-intinerary">
                        <div class="md-card atl-form-tour atl-intinerary--item">
                            <?php 
                                View(
                                    'backend/layout/booking/tour.tpl',
                                    [ 
                                        'tour' => $tour
                                    ]
                                ); 
                            ?>
                        </div>
                        <div class="md-card atl-form-deposit atl-intinerary--item">
                            <?php 
                                if (!empty($deposit)) {
                                    View(
                                        'backend/mailbox/layout/detailbooking/deposit.tpl', 
                                        [
                                            'deposit' => $deposit
                                        ]
                                    );
                                }
                            ?>
                        </div>
                        <?php
                            if (!empty($listIntinerary)) {
                                View(
                                    'backend/layout/booking/intinerary.tpl', 
                                    [ 
                                        'intinerary' => $listIntinerary,
                                        'idBooking' => $id,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdGuider' => $mdGuider,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'priceTotalInti' => $priceTotalInti,
                                        'helpPrice' => $helpPrice,
                                        'self' => self::$control,
                                    ]
                                ); 
                            }
                        ?>
                        <?php
                            if ($services) {
                                View(
                                    'backend/layout/booking/services.tpl', 
                                    [ 
                                        'services' => $services,
                                        'idBooking' => $id,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdGuider' => $mdGuider,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'priceTotalServ' => $priceTotalServ,
                                        'helpPrice' => $helpPrice,
                                        'self' => self::$control,
                                    ]
                                ); 
                            }
                        ?>
                    </form>
                </div>
            </div>
        <?php
    }
}
