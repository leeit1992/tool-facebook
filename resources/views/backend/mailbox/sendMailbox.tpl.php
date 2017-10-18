<div class="atl-page-handle-mailbox">
    <div class="md-card-list-wrapper" id="mailbox">
        <div class="uk-width-large-8-10 uk-container-center">
            <div class="md-card-list">
                <div class="md-card-list-header heading_list"><?php echo isset($displayMessage) ? $displayMessage : ''; ?></div>
                <ul class="hierarchical_slide">
                    <?php 
                    foreach ($listMailbox as $mailbox) { ?>
                        <li>
                            <span class="md-card-list-item-date"><?php echo (!empty($mailbox['mailbox_postdate'])) ? date('d-m-Y',strtotime(str_replace('-','/', $mailbox['mailbox_postdate']))) : ''; ?></span>
                            <div class="md-card-list-item-avatar-wrapper">
                                <?php
                                    $avatar = $mdUser->getMetaData( $mailbox['mailbox_receiver'], 'user_avatar' );
                                ?>
                                <img src="<?php echo url(!empty($avatar)?$avatar:'/public/backend/assets/img/user.png') ?>" class="md-card-list-item-avatar" alt="">
                            </div>
                            <div class="md-card-list-item-sender">
                                <?php
                                    $email = 'ALL CEO';
                                    if ($mailbox['mailbox_receiver'] > 0) {
                                        $user = $mdUser->getUserBy( 'id', $mailbox['mailbox_receiver']);
                                        $email = !empty($user) ? $user[0]['user_email'] : '';
                                    }
                                ?>
                                <span><a href="#"><?php echo $email; ?></a></span>
                            </div>
                            <div class="md-card-list-item-subject">
                                <span><?php echo isset($mailbox['mailbox_title']) ? $mailbox['mailbox_title'] : '' ?></span>
                            </div>
                            <div class="md-card-list-item-content-wrapper" style="padding-top: 10px">
                                Message:
                                <div class="md-card-list-item-content atl-mailbox-desc">
                                    <?php echo isset($mailbox['mailbox_description']) ? $mailbox['mailbox_description'] : '' ?>
                                </div>                           
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent atl-btn-send-mailbox" href="#atl-send-mailbox" data-uk-modal="{center:true}">
            <i class="material-icons"></i>
        </a>
    </div>
    <div class="uk-modal" id="atl-send-mailbox">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close uk-close" type="button"></button>
            <form action="" method="post" id="atl-form-mailbox" enctype="multipart/form-data">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-1">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">COMPOSE BOOKING</h3>
                            </div>
                            <div class="md-card-content large-padding">
                                <div class="uk-margin-medium-bottom">
                                    <label >Title</label>
                                    <input type="text" name="atl_mailbox_title" class="md-input atl-required-js"/>
                                </div>
                                <div class="uk-margin-medium-bottom">
                                    <label >Description</label>
                                    <textarea name="atl_mailbox_description" cols="30" rows="3" class="md-input atl-required-js atl-desc-mailbox"></textarea>
                                </div>
                                <div class="uk-margin-medium-bottom">
                                    <label class="uk-margin-medium-bottom">Choose Booking</label>
                                    <select name="atl_mailbox_booking" class="atl-booking-mailbox" data-md-selectize>
                                        <option value="">Select...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="uk-margin-medium-bottom">
                                    <label class="uk-margin-medium-bottom">CEO receiver</label>
                                    <select name="atl_mailbox_receiver" class="atl-receiver-mailbox" data-md-selectize>
                                        <option value="">Select...</option>
                                        <option value="ceo">All CEO</option>
                                        <?php 
                                        foreach ($ceoUser as $ceo) { ?>
                                            <option value="<?php echo $ceo['id']; ?>"><?php echo $ceo['user_name'] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="uk-form-row">
                                    <span class="uk-input-group-addon">
                                        <button type="submit" class="md-btn">SEND</button>
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>

<?php 
    registerScrips( array(
        'page_mailbox' => assets('backend/assets/js/pages/page_mailbox.min.js'),
        'page-admin-mailbox' => assets('backend/js/page-admin-mailbox.min.js'),
    ) );
?>
