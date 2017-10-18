<?php
    $classSectionModule = isset($_GET['bkPage']) ? 'atl-hidde-info' : '';
?>
<style type="text/css">
    .atl-hidde-info{
        display: none;
    }
</style>
<div id="page-admin-booking">
    <form action="<?php echo url('/atl-admin/validate-booking') ?>" method="POST" id="page-admin-booking-form">
        <?php
        if (!empty($booking)) {
            echo $self->renderInput(
                array(
                    'name' => 'atl_booking_id',
                    'type' => 'hidden',
                    'value' => $booking['id']
                )
            );
            View(
                'backend/booking/layout/addBookingButton.tpl',
                [
                    'link' => url('/atl-admin/add-booking'),
                    'pdf' => true,
                    'id'  => $booking['id']
                ]
            );
        }
    ?>
    <div class="md-card">
        <?php View('backend/booking/layout/customerInfomation.tpl', ['self' => $self, 'listCountry' => $listCountry, 'customer' => $customer,  ]) ?> 
    </div>

    <div class="md-card">
        <?php View('backend/booking/layout/bookingInfomation.tpl', ['self' => $self, 'listOffice' => $listOffice, 'metaBooking' => $metaBooking, 'booking' => $booking]) ?> 
    </div>

    <?php 
        $bkPage = false;
        if (isset($_GET['bkPage']))
        {
            $bkPage = $_GET['bkPage'];
        }
    ?>

    <div class="md-card" id="atl-tour-infomation">
        <?php if (isset($booking['id'])) : ?>
        <ul class="uk-tab atl-card-tour">
             <li <?php echo !($bkPage) ? 'class="uk-active" ' : ''; ?>>
                <a href="<?php echo url('/atl-admin/edit-booking/' . $booking['id'] . '#atl-tour-infomation') ?>" title="Details of each service." data-uk-tooltip="{pos:'top'}" style="color: #1977d2;">Booking Details</a>
            </li>
            <li <?php echo ( 'dayCost.tpl' == $bkPage ) ? 'class="uk-active" ' : ''; ?>>
                <a class="atl-btn-booking-summary" style="color: #1977d2;" title="Cost per day." data-uk-tooltip="{pos:'top'}" href="<?php echo url('/atl-admin/edit-booking/' . $booking['id'] . '?bkPage=dayCost.tpl' . '#atl-tour-infomation') ?>">Day COST</a>
            </li>
            <li <?php echo ( 'checklist.tpl' == $bkPage ) ? 'class="uk-active" ' : ''; ?>>
                <a class="atl-btn-booking-summary" style="color: #1977d2;" title="Cost per location/city." data-uk-tooltip="{pos:'top'}" href="<?php echo url('/atl-admin/edit-booking/' . $booking['id'] . '?bkPage=checklist.tpl' . '#atl-tour-infomation') ?>">Check List</a>
            </li>
            <li <?php echo ( 'payment.tpl' == $bkPage ) ? 'class="uk-active" ' : ''; ?>>
                <a class="atl-btn-booking-summary" style="color: #1977d2;" title="Cost of whole Booking." data-uk-tooltip="{pos:'top'}" href="<?php echo url('/atl-admin/edit-booking/' . $booking['id'] . '?bkPage=payment.tpl' . '#atl-tour-infomation') ?>">Payment</a>
            </li>
        </ul>
        <?php endif; ?>
        <div class="<?php echo $classSectionModule ?>">
            <?php View('backend/booking/layout/tourInfomation.tpl', ['self' => $self,'tour' => $tour, 'listTemplateTour' => $listTemplateTour, 'listIntinerary' => $listIntinerary, 'bookingTemplate' => $bookingTemplate ]) ?> 
        </div>
        <?php if (isset($_GET['bkPage'])) : ?>
            <?php 
                switch ($bkPage) {
                    case 'dayCost.tpl':
                        View('backend/booking/layout/dayCost.tpl', [
                                        'listIntinerary' => $listIntinerary,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdGuider' => $mdGuider,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'priceTotalInti' => $priceTotalInti,
                                        'apiChecklist' => $apiChecklist
                                    ]
                        );
                    break;
                    case 'checklist.tpl':
                        View('backend/booking/layout/checklist.tpl', [
                                        'listIntinerary' => $listIntinerary,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdGuider' => $mdGuider,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'priceTotalInti' => $priceTotalInti,
                                        'apiChecklist' => $apiChecklist
                                    ]
                        );
                    break;

                    case 'payment.tpl':
                        View('backend/booking/layout/payment.tpl', [
                                        'listIntinerary' => $listIntinerary,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdGuider' => $mdGuider,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'priceTotalInti' => $priceTotalInti,
                                        'apiChecklist' => $apiChecklist
                                    ]
                        );
                    break;

                }
                
            ?>
        <?php endif; ?>
    </div>

    <div class="md-card <?php echo $classSectionModule ?>">
        <?php View('backend/booking/layout/depositInfomation.tpl', ['self' => $self, 'deposit' => $deposit]) ?> 
    </div>

    <div class="md-card <?php echo $classSectionModule ?>">
    <?php View('backend/booking/layout/serviceInfomation.tpl', ['self' => $self, 'booking' => $booking, 'mdDriver' => $mdDriver, 'apiCar' => $apiCar, 'getAllCar' => $getAllCar, 'dataOtherService' => $dataOtherService, 'dataGuider' => $dataGuider]) ?> 
    </div>

    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons md-24">&#xE163;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom"><?php echo $actionName; ?> Booking</h4>

            <div class="uk-width-medium-1-1 uk-margin-bottom">
                <label>Booking Title</label>
                <?php
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[title]',
                            'type'  => 'text',
                            'class' => 'md-input',
                            'value' => isset($booking['booking_title']) ? $booking['booking_title'] : ''
                        )
                    );
                ?>
            </div>

            <div class="uk-width-medium-1-1 uk-margin-bottom">
                <label>Note</label>
                <textarea cols="30" rows="4" class="md-input" name="atl_booking[note]"><?php echo isset($booking['booking_note']) ? $booking['booking_note'] : '' ?></textarea>
            </div>

            <button type="submit" class="md-btn" id="atl-booking-save"> Save </button> 
        </div>
    </div>
    </form>
    <?php View('backend/booking/layout/popin.tpl', ['self' => $self]) ?> 
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;"></div>
    <?php
    if (!empty($booking)) {
        View(
            'backend/booking/layout/addBookingButton.tpl',
            [
            'link' => url('/atl-admin/add-booking'),
            'pdf' => false
            ]
        );
    }
    ?>
    <textarea id="atl-list-location-data" style="display: none;"><?php echo json_encode($listLocation) ?></textarea>
</div>

<?php
registerScrips(array(
    'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
    'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
    'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
    'booking-deposit' => assets('backend/js/booking/admin-booking-deposit-debug.js'),
    // Service
    'booking-car' => assets('backend/js/booking/admin-booking-car-debug.js'),
    'booking-visa' => assets('backend/js/booking/admin-booking-visa-debug.js'),
    'booking-accomodation' => assets('backend/js/booking/admin-booking-accomodation-debug.js'),
    'booking-guider' => assets('backend/js/booking/admin-booking-guider-debug.js'),
    'booking-other' => assets('backend/js/booking/admin-booking-other-debug.js'),
    'booking-ticket' => assets('backend/js/booking/admin-booking-ticket-debug.js'),

    'admin-service-center' => assets('/backend/js/booking/admin-booking-service-center-debug.js'),
    'admin-tour-template' => assets('/backend/js/booking/admin-booking-tour-template-debug.js'),
    'admin-booking' => assets('/backend/js/page-admin-booking-debug.js')
));
