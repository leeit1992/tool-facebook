<div id="avt-page-packet-like">
    <form action="<?php echo url('/user-tool/validate-packet-like') ?>" method="post" id="avt-form-packet-like" enctype="multipart/form-data">
        <div class="md-card">
            <div class="user_heading">
                <h2 class="heading_a" style="color: white;"><?php echo $actionName; ?> gói dịch vụ auto like
                </h2>
            </div>
            <div class="user_content" data-uk-grid-margin>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin="">
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>" >
                                        <label>Tên gói auto like</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_name',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $infoPacketLike['service_name'] ) ? $infoPacketLike['service_name'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Giá tiền (VNĐ) / Tháng</label>
                                        <?php
                                            echo $self->renderInput( [
                                                'name'  => 'avt_service_price',
                                                'type'  => 'text',
                                                'class' => 'md-input masked_input avt-required-js',
                                                'value' => isset( $infoPacketLike['service_price'] ) ? $infoPacketLike['service_price'] : '',
                                                'attr' => [
                                                        'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'",
                                                        'data-inputmask-showmaskonhover' => 'false'
                                                    ]
                                            ] );
                                        ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div><br>
                            </div>
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Giới hạn like / Bài</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_like_number',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $meta['like_number'] ) ? $meta['like_number'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Giới hạn bài đăng / Ngày</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_like_post',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $meta['post_limit'] ) ? $meta['post_limit'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="uk-form-row uk-text-center">
                        <button type="submit" class="md-btn md-btn-primary"><?php echo $actionName; ?></button>
                    </div>
                    <?php 
                        if( !empty( $infoPacketLike ) ) {
                            echo $self->renderInput( 
                                array( 
                                    'name' => 'avt_service_id', 
                                    'type' => 'hidden', 
                                    'value' => $infoPacketLike['id']
                                ) 
                            );
                            View(
                                $addButton,
                                [
                                    'link' => url('/user-tool/add-packet-like'),
                                    'title' => 'packet like'
                                ]
                            );
                        }
                    ?>
            </div>    
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( [ 'page-packet-like' => assets('frontend/js/page-packet-like-debug.js') ] );
