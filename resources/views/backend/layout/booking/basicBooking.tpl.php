<div class="uk-width-medium-8-10 uk-container-center">
    <h3 class="heading_a">
        Info Booking
    </h3>
    <div class="uk-grid uk-grid-divider" data-uk-grid-margin="">
        <div class="uk-width-medium-1-2">
            <span class="uk-text-muted uk-text-small">Booking code: </span>
            <span class="uk-text-large uk-text-right"><?php echo isset($infoBooking['booking_code']) ? $infoBooking['booking_code'] : ''; ?></span><br><br>

            <span class="uk-text-muted uk-text-small ">Full name: </span>
            <span class="uk-text-large  atl-customer-name"><?php echo isset($customer['name']) ? $customer['name'] : ''?></span><br>
   
            <span class="uk-text-muted uk-text-small ">Birthday: </span>
            <span class="uk-text-large  atl-customer-birthday"><?php echo (!empty($customer['birthday']) && isset($customer['birthday'])) ? date( 'j F Y', strtotime( $customer['birthday'] ) ) : ''?></span><br>
   
            <span class="uk-text-muted uk-text-small ">Address: </span>
            <span class="uk-text-large  atl-customer-address"><?php echo isset($customer['address']) ? $customer['address'] : ''?></span><br><br>

            <span class="uk-text-muted uk-text-small ">Start date: </span>
            <span class="uk-text-large  atl-booking-start"><?php echo (isset($infoBooking['booking_start_date']) && !empty($infoBooking['booking_start_date'])) ? date( 'j F Y', strtotime( $infoBooking['booking_start_date'] ) ) : ''?></span><br>

            <span class="uk-text-muted uk-text-small ">End date: </span>
            <span class="uk-text-large  atl-booking-end"><?php echo (isset($infoBooking['booking_end_date']) && !empty($infoBooking['booking_end_date'])) ? date( 'j F Y', strtotime( $infoBooking['booking_end_date'] ) ) : ''?></span><br><br>

            <span class="uk-text-muted uk-text-small ">Passport number: </span>
            <span class="uk-text-large  atl-customer-passport"><?php echo isset($customer['passport']) ? $customer['passport'] : ''?></span><br>

            <span class="uk-text-muted uk-text-small ">Passport expired date</span>
            <span class="uk-text-large  atl-customer-expired"><?php echo isset($customer['expired']) ? $customer['expired'] : ''?></span>
        </div>
        <div class="uk-width-medium-1-2">
            <span class="uk-text-muted uk-text-small ">Random code: </span>
            <span class="uk-text-large  atl-booking-random"><?php echo isset($metaBooking['random']) ? $metaBooking['random'] : ''?></span><br><br>

            <span class="uk-text-muted uk-text-small ">Pickup Address: </span>
            <span class="uk-text-large  atl-booking-pickup"><?php echo isset($metaBooking['pickup']) ? $metaBooking['pickup'] : ''?></span><br>

            <span class="uk-text-muted uk-text-small ">Office: </span>
            <span class="uk-text-large  atl-booking-office">
                <?php 
                    $office = $mdOffice->getOfficeBy('id', $infoBooking['booking_office']);
                ?>
            </span><?php echo isset($office[0]['office_name']) ? $office[0]['office_name'] : ''; ?><br><br>

            <span class="uk-text-muted uk-text-small ">Special Note: </span>
            <span class="uk-text-large  atl-booking-special"><?php echo isset($metaBooking['specialnote']) ? $metaBooking['specialnote'] : ''?></span><br>                                 
        </div>
    </div>
    <hr class="uk-grid-divider">
</div>
