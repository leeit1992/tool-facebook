<div id="avt-page-packet-comment">
    <form action="<?php echo url('/user-tool/validate-packet-comment') ?>" method="post" id="avt-form-packet-comment" enctype="multipart/form-data">
        <div class="md-card">
            <div class="user_heading">
                <h2 class="heading_a" style="color: white;"><?php echo $actionName; ?> gói dịch vụ comment
                </h2>
            </div>
            <div class="user_content" data-uk-grid-margin>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin="">
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>" >
                                        <label>Tên gói comment</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_name',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $infoPacketComment['service_name'] ) ? $infoPacketComment['service_name'] : ''
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
                                                'value' => isset( $infoPacketComment['service_price'] ) ? $infoPacketComment['service_price'] : '',
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
                                        <label>Giới hạn comment / Bài</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_comment_number',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $meta['comment_number'] ) ? $meta['comment_number'] : ''
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
                                                    'name'  => 'avt_comment_post',
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
                        if( !empty( $infoPacketComment ) ) {
                            echo $self->renderInput( 
                                array( 
                                    'name' => 'avt_service_id', 
                                    'type' => 'hidden', 
                                    'value' => $infoPacketComment['id']
                                ) 
                            );
                            View(
                                $addButton,
                                [
                                    'link' => url('/user-tool/add-packet-comment'),
                                    'title' => 'packet comment'
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
registerScrips( [ 'page-packet-comment' => assets('frontend/js/page-packet-comment-debug.js') ] );
