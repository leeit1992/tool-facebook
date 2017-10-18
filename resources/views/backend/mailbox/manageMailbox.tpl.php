<div class="atl-page-handle-mailbox">
    <div class="md-card-list-wrapper" id="mailbox">
        <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-list">
                <div class="md-card-list-header heading_list"><?php echo isset($displayMessage) ? $displayMessage : ''; ?></div>
                <ul class="hierarchical_slide">
                    <?php foreach ($listMailbox as $lMB) { 
                        $idBooking = $mdMailbox->getMetaData($lMB['mailbox_id'], 'mailbox_booking');
                        $booking = $mdBooking->getBookingBy('id', $idBooking); ?>
                        <li class="atl-status-mailbox <?php echo ($lMB['mailbox_status'] == 1) ? 'md-card-list-item-selected' : '' ?>" data-id="<?php echo $lMB['mailbox_id']; ?>" data-type="seen">
                            <div class="md-card-list-item-menu" data-uk-dropdown="{mode:'click'}">
                                <a class="atl-btn-delete-mailbox" data-id="<?php echo $lMB['mailbox_id']; ?>"><i class="md-icon material-icons">delete</i></a>
                            </div>
                            <span class="md-card-list-item-date"><?php echo (!empty($lMB['mailbox_postdate'])) ? date('d-m-Y',strtotime(str_replace('-','/', $lMB['mailbox_postdate']))) : ''; ?></span>
                            <div class="md-card-list-item-select">
                                <?php
                                    $idStatus='';
                                    if (!empty($booking[0]['booking_status'])) {
                                        switch ($booking[0]['booking_status']) {
                                            case '1':
                                                $idStatus = 'warning';
                                                break;
                                            case '2':
                                                $idStatus = 'danger';
                                                break;
                                            case '3':
                                                $idStatus = 'success';
                                                break;
                                        }
                                    }else{
                                        $idStatus = 'muted';
                                    }
                                ?>
                                <div class="atl-text-status uk-text-<?php echo $idStatus; ?>"><?php
                                    if (!empty($booking[0]['booking_status'])) {
                                        foreach ($mdBooking->getStatusBooking() as $key => $value) {
                                            echo ($key == $booking[0]['booking_status']) ? $value : '';
                                        }
                                    }else{
                                        echo 'Booking deleted';
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="md-card-list-item-avatar-wrapper">
                                <?php
                                    $avatar = $mdUser->getMetaData( $lMB['mailbox_author'], 'user_avatar' );
                                ?>
                                <img src="<?php echo url(!empty($avatar)?$avatar:'/public/backend/assets/img/user.png') ?>" class="md-card-list-item-avatar" alt="">
                            </div>
                            <div class="md-card-list-item-sender">
                                <?php
                                    $user = $mdUser->getUserBy('id',$lMB['mailbox_author']); ?>
                                <span><a href="#"><?php echo $user[0]['user_email']; ?></a></span>
                            </div>
                            <div class="md-card-list-item-subject">
                                <span><?php echo isset($lMB['mailbox_title']) ? $lMB['mailbox_title'] : '' ?></span>
                            </div>
                            <div class="md-card-list-item-content-wrapper">
                                Message:
                                <div class="md-card-list-item-content atl-mailbox-desc">
                                    <?php echo isset($lMB['mailbox_description']) ? $lMB['mailbox_description'] : '' ?></div>
                                <?php if (isset($booking[0]['booking_status'])): ?>
                                    <button class="md-btn atl-btn-display-booking" data-id="<?php echo $idBooking; ?>" data-role="<?php echo $dataRole; ?>" data-uk-modal="{target:'#viewDetalBooking'}"  data-uk-tooltip="{pos:'bottom'}">Detail</button>
                                    <?php if ($roleOperator == 'operator'): ?>
                                        <?php if ($booking[0]['booking_status'] != '3') { ?>
                                        <button class="md-btn atl-status-booking" data-id="<?php echo $idBooking; ?>" data-type="accept">Accept</button>
                                        <?php } ?>
                                        <?php if ($booking[0]['booking_status'] != '2') { ?>
                                            <button class="md-btn atl-status-booking" data-id="<?php echo $idBooking; ?>" data-type="refuse">Refuse</button>
                                        <?php } ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php 
        View(
            'backend/mailbox/layout/displayDetailBooking.tpl'
        ); 
    ?>
</div>
<?php 
    registerScrips( array(
        'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
        'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
        'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
        'page_mailbox' => assets('backend/assets/js/pages/page_mailbox.min.js'),
        'page-admin-mailbox' => assets('backend/js/page-admin-mailbox.min.js')
    ) );
?>
