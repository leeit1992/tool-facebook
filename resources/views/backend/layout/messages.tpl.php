<li data-uk-dropdown="{mode:'click'}">
    <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge atl-qty-notifiednew"><?php echo isset($qtyNotifiedNew)? $qtyNotifiedNew: ''; ?></span></a>
    <div class="uk-dropdown uk-dropdown-xlarge uk-dropdown-flip">
        <div class="md-card-content">
            <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (<span class="atl-qty-messagesnew"><?php echo isset($qtyMessageNew)? $qtyMessageNew: ''; ?></span>)</a></li>
                <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Booking (<span class="atl-qty-bookingsnew"><?php echo isset($qtyBookingNew)? $qtyBookingNew: ''; ?></span>)</a></li>
            </ul>
            <ul id="header_alerts" class="uk-switcher uk-margin">
                <li>
                    <ul class="md-list md-list-addon">
                        <?php
                            foreach ($listMessage as $messages) { ?>
                                <li>
                                    <input type="hidden" name="atl-mailbox-id[]" value="<?php echo $messages['mailbox_id'] ?>">
                                    <div class="md-list-addon-element">
                                        <?php
                                            $avatar = $mdUser->getMetaData( $messages['mailbox_author'], 'user_avatar' );
                                        ?>
                                        <img src="<?php echo url(!empty($avatar)?$avatar:'/public/backend/assets/img/user.png') ?>" class="md-user-image md-list-addon-avatar" alt="">
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">
                                            <a href="<?php echo url('/atl-admin/manage-mailbox') ?>" class="atl-notified-status" data-idMail="<?php echo isset($messages['mailbox_id']) ? $messages['mailbox_id'] : ''; ?>" data-type="messages"> <?php echo isset($messages['mailbox_title'])? $messages['mailbox_title'] : ""; ?></a>
                                        </span>
                                        <span class="uk-text-small uk-text-muted"><?php echo isset($messages['mailbox_description'])? $messages['mailbox_description'] : ""; ?></span>
                                    </div>
                                </li>
                        <?php   }
                        ?>

                    </ul>
                    <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                        <a href="<?php echo url('/atl-admin/manage-mailbox'); ?>" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                    </div>
                </li>
                <li>
                    <ul class="md-list md-list-addon">
                        <?php foreach ($listBooking as $bookings): ?>
                            <li>
                                <div class="md-list-addon-element">
                                    <i class="md-list-addon-icon material-icons uk-text-warning">edit</i>
                                </div>
                                <div class="md-list-content">
                                    <?php if ($roleUser == 'sale'): ?>
                                        <span class="md-list-heading">
                                            <a class="atl-notified-display-booking atl-notified-status" data-idMail="<?php echo isset($bookings['mailbox_id']) ? $bookings['mailbox_id'] : ''; ?>" data-id="<?php echo isset($bookings['mailbox_booking']) ? $bookings['mailbox_booking'] : '' ?>" data-type="bookings" data-uk-modal="{target:'#viewNotifiedBooking'}"  data-uk-tooltip="{pos:'bottom'}" >
                                                <?php echo isset($bookings['mailbox_title'])? $bookings['mailbox_title'] : ""; ?>
                                            </a>
                                        </span>
                                    <?php else: ?>
                                        <a class="md-list-heading atl-notified-status" data-idMail="<?php echo isset($bookings['mailbox_id']) ? $bookings['mailbox_id'] : ''; ?>" data-type="bookings">
                                            <?php echo isset($bookings['mailbox_title'])? $bookings['mailbox_title'] : ""; ?>
                                        </a>
                                    <?php endif ?>
                                    <span class="uk-text-small uk-text-muted uk-text-truncate"><?php echo isset($bookings['mailbox_description'])? $bookings['mailbox_description'] : ""; ?></span>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</li>