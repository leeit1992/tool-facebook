<li>
    <div class="uk-margin-top">
        <h3 class="full_width_in_card heading_c">
            Thông tin chung
        </h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <label>Họ và tên</label>
                <input class="md-input" type="text" name="atl_user_name" value="<?php echo isset( $user['user_name'] ) ? $user['user_name'] : '' ?>" />
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-input-group">
                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                    <div class="md-input-wrapper <?php echo isset( $meta['user_birthday'] ) ? 'md-input-filled' : '' ?>">
                        <label>Ngày sinh</label>
                        <input class="md-input" type="text" name="atl_user_birthday" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo isset( $meta['user_birthday'] ) ? $meta['user_birthday'] : '' ?>">
                        <span class="md-input-bar"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <label>Giới thiệu</label>
                <textarea class="md-input" name="atl_user_moreinfo" cols="30" rows="4"><?php echo isset( $meta['user_moreinfo'] ) ? $meta['user_moreinfo'] : '' ?></textarea>
            </div>
        </div>
        <h3 class="full_width_in_card heading_c">
            Thông tin liên lạc
        </h3>
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
                    <div>
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="md-list-addon-icon material-icons material-icons">home</i>
                            </span>
                            <label>Địa chỉ</label>
                            <input type="text" class="md-input" name="atl_user_address" value="<?php echo isset( $meta['user_address'] ) ? $meta['user_address'] : '' ?>" />
                        </div>
                    </div>
                    <div>
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                            </span>
                            <label>Số điện thoại</label>
                            <input type="text" class="md-input" name="atl_user_phone" value="<?php echo isset( $meta['user_phone'] ) ? $meta['user_phone'] : '' ?>" />
                        </div>
                    </div>
                    <div>
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                            </span>
                            <label>Facebook</label>
                            <input type="text" class="md-input" name="atl_user_social[fb]" value="<?php echo isset( $social['fb'] ) ? $social['fb'] : '' ?>" />
                        </div>
                    </div>
                    <div>
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="md-list-addon-icon uk-icon-google-plus"></i>
                            </span>
                            <label>Google+</label>
                            <input type="text" class="md-input" name="atl_user_social[gplus]" value="<?php echo isset( $social['gplus'] ) ? $social['gplus'] : '' ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
