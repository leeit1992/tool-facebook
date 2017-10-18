<div class="md-card-content">
    <h3 class="heading_a" style="color: #1977d2;">Booking Info</h3>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <label>Booking Code</label>
                        <?php 
               
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_booking[code]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input label-fixed',
                                    'value' => isset( $booking['booking_code'] ) ? $booking['booking_code'] : '#BK-'.substr(uniqid(), 7, 4),
                                    'attr' => [
                                        'style' => 'text-transform: uppercase;'
                                    ]
                                )
                            ); 
                        ?>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label for="uk_dp_start">Start Date</label>
                            <input class="md-input label-fixed atl-booking-info-start" name="atl_booking[start_date]" type="text" value="<?php echo isset( $booking['booking_start_date'] ) ? date('Y/m/d', strtotime($booking['booking_start_date'])): ''; ?>">
                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Number Of Day</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_booking[booking][numofday]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input label-fixed',
                                    'value' => isset( $metaBooking['numofday'] ) ? $metaBooking['numofday'] : ''
                                )
                            ); 
                        ?>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <label>Pickup Address</label>
                        <textarea class="md-input" name="atl_booking[booking][pickup]"><?php echo isset( $metaBooking['pickup'] ) ? $metaBooking['pickup'] : '' ?></textarea>
                    </div> 
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <label class="atl-label">Office</label>
                        <select id="select_demo_1" name="atl_booking[office]" data-md-selectize>
                            <option value="">Choose Office</option>
                            <?php
                                foreach ($listOffice as $office) {
                                    $selected = isset( $booking['booking_office'] ) ? selected( $booking['booking_office'], $office['id'] ) : '';
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $office['id']; ?>"> <?php echo $office['office_name'] ?></option>
                                <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <label>Random Code</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_booking[booking][random]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input label-fixed',
                                    'value' => isset( $metaBooking['random'] ) ? $metaBooking['random'] : '#BKID-'.substr(uniqid(), 7, 4),
                                    'attr' => [
                                        'readOnly' => '',
                                        'style' => 'text-transform: uppercase;'
                                    ]
                                )
                            ); 
                        ?>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label for="uk_dp_end">End Date</label>
                            <input class="md-input label-fixed atl-booking-info-end" name="atl_booking[end_date]" type="text" value="<?php echo isset( $booking['booking_end_date'] ) ? date('Y/m/d', strtotime($booking['booking_end_date'])): ''; ?>">
                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Number Of Guests</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_booking[booking][numofguests]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input label-fixed',
                                    'value' => isset( $metaBooking['numofguests'] ) ? $metaBooking['numofguests'] : ''
                                )
                            ); 
                        ?>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <label>Special Note </label>
                        <textarea class="md-input" name="atl_booking[booking][specialnote]"><?php echo isset( $metaBooking['specialnote'] ) ? $metaBooking['specialnote'] : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>