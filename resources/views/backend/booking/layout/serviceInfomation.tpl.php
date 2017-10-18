<?php
    $serviceWrapId = uniqid();
    $serviceChecked = !empty($booking['booking_check_service']) ? json_decode($booking['booking_check_service']) : [];
    $bookingService = !empty($booking['booking_service']) ? json_decode($booking['booking_service'], true) : [];
    $nameKey = 'atl_booking[service]';

?>
<div class="md-card-content">
    <h3 class="heading_a">Service Infomation</h3>
    <div data-id="booking-service" class="uk-grid atl-booking-service atl-intinerary--item">
        <div class="uk-width-medium-1-1">                   
            <div class="atl-service--item-sv uk-grid-margin">
                <?php
                    $accCheck = (false !== array_search('acc', $serviceChecked)) ? 'checked' : '';
                    $accShow = (false !== array_search('acc', $serviceChecked)) ? 'style="display: block;"' : '';
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[checkService][]',
                            'type'  => 'checkbox',
                            'class' => 'atl-service--item-tour-service',
                            'value' => 'acc',
                            'attr' => [
                                'id' => "tour-sv-acc-".$serviceWrapId,
                                'data-md-icheck' => '',
                                $accCheck => ''
                            ]
                        )
                    );
                ?>
                <label for="tour-sv-acc-<?php echo $serviceWrapId ?>" class="inline-label">ACCOMOMDATION</label>
                <div class="atl-service--item-sv-content" <?php echo $accShow; ?>>
                <?php
                    View(
                        'backend/booking/service/hotel.tpl',
                        [
                            'self' => $self,
                            'title' => false,
                            'wrapId' => $serviceWrapId,
                            'nameKey' => $nameKey,
                            'nameType' => 'single',
                            'svData' => isset($bookingService['acc']) ? $bookingService['acc'] : []
                        ]
                    )
                ?>
                </div>
            </div>

            <div class="atl-service--item-sv uk-grid-margin">
                <?php
                    $ticketCheck = (false !== array_search('ticket', $serviceChecked)) ? 'checked' : '';
                    $ticketShow = (false !== array_search('ticket', $serviceChecked)) ? 'style="display: block;"' : '';
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[checkService][]',
                            'type'  => 'checkbox',
                            'class' => 'atl-service--item-tour-service',
                            'value' => 'ticket',
                            'attr' => [
                                'id' => "tour-sv-tk-".$serviceWrapId,
                                'data-md-icheck' => '',
                                $ticketCheck => ''
                            ]
                        )
                    );
                ?>
                <label for="tour-sv-tk-<?php echo $serviceWrapId ?>" class="inline-label">FLIGHT, TRAIN TICKETS</label>
                <div class="atl-service--item-sv-content" <?php echo $ticketShow ?>>
                    <?php
                        View(
                            'backend/booking/service/ticket.tpl',
                            [
                                'self' => $self,
                                'title' => false,
                                'wrapId' => $serviceWrapId,
                                'nameKey' => $nameKey,
                                'nameType' => 'single',
                                'svData' => isset($bookingService['ticket']) ? $bookingService['ticket'] : []
                            ]
                        )
                    ?>
                </div>
            </div>

            <div class="atl-service--item-sv uk-grid-margin">
                <?php
                    $carCheck = (false !== array_search('car', $serviceChecked)) ? 'checked' : '';
                    $carShow = (false !== array_search('car', $serviceChecked)) ? 'style="display: block;"' : '';
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[checkService][]',
                            'type'  => 'checkbox',
                            'class' => 'atl-service--item-tour-service',
                            'value' => 'car',
                            'attr' => [
                                'id' => "tour-sv-car-".$serviceWrapId,
                                'data-md-icheck' => '',
                                $carCheck => ''
                            ]
                        )
                    );
                ?>
                <label for="tour-sv-car-<?php echo $serviceWrapId ?>" class="inline-label">CAR</label>
                <div class="atl-service--item-sv-content" <?php echo $carShow ?>>
                    <?php
                        View(
                            'backend/booking/service/car.tpl',
                            [
                                'self' => $self,
                                'title' => false,
                                'wrapId' => $serviceWrapId,
                                'mdDriver' => $mdDriver,
                                'apiCar' => $apiCar,
                                'getAllCar' => $getAllCar,
                                'nameKey' => $nameKey,
                                'nameType' => 'single',
                                'dataGuider' => $dataGuider,
                                'svData' => isset($bookingService['car']) ? $bookingService['car'] : []
                            ]
                        )
                    ?>
                </div>
            </div>
            <div class="atl-service--item-sv uk-grid-margin">
                <?php
                    $guiderCheck = (false !== array_search('guider', $serviceChecked)) ? 'checked' : '';
                    $guiderShow = (false !== array_search('guider', $serviceChecked)) ? 'style="display: block;"' : '';
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[checkService][]',
                            'type'  => 'checkbox',
                            'class' => 'atl-service--item-tour-service',
                            'value' => 'guider',
                            'attr' => [
                                'id' => "tour-sv-guider-".$serviceWrapId,
                                'data-md-icheck' => '',
                                $guiderCheck => ''
                            ]
                        )
                    );
                ?> 
                <label for="tour-sv-guider-<?php echo $serviceWrapId ?>" class="inline-label">GUIDE</label>
                <div class="atl-service--item-sv-content" <?php echo $guiderShow ?>>
                <?php
                    View(
                        'backend/booking/service/guider.tpl',
                        [
                            'self' => $self,
                            'title' => false,
                            'dataGuider' => $dataGuider,
                            'wrapId' => $serviceWrapId,
                            'svData' => isset($bookingService['guider']) ? $bookingService['guider'] : []
                        ]
                    ) ?>
                </div>
            </div> 
            <div class="atl-service--item-sv uk-grid-margin">
                <?php
                    $otherCheck = (false !== array_search('other', $serviceChecked)) ? 'checked' : '';
                    $otherShow = (false !== array_search('other', $serviceChecked)) ? 'style="display: block;"' : '';
                    echo $self->renderInput(
                        array(
                            'name'  => 'atl_booking[checkService][]',
                            'type'  => 'checkbox',
                            'class' => 'atl-service--item-tour-service',
                            'value' => 'other',
                            'attr' => [
                                'id' => "tour-sv-other-".$serviceWrapId,
                                'data-md-icheck' => '',
                                $otherCheck => ''
                            ]
                        )
                    );
                ?> 
                <label for="tour-sv-other-<?php echo $serviceWrapId ?>" class="inline-label">OTHERS</label>
                <div class="atl-service--item-sv-content" <?php echo $otherShow ?>>
                <?php
                    View(
                        'backend/booking/service/other.tpl',
                        [
                            'self' => $self,
                            'title' => false,
                            'dataOtherService' => $dataOtherService,
                            'wrapId' => $serviceWrapId,
                            'nameKey' => $nameKey,
                            'nameType' => 'single',
                            'svData' => isset($bookingService['other']) ? $bookingService['other'] : []
                        ]
                    ) ?>
                </div>
            </div> 
        </div>
    </div>
</div>