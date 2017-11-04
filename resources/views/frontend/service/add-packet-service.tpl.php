<div id="avt-page-handle-service">
    <form action="<?php echo url('/user-tool/validate-packet-service') ?>" method="post" id="avt-form-service" enctype="multipart/form-data">
        <div class="md-card">
            <div class="user_heading">
                <h2 class="heading_a" style="color: white;"><?php echo $actionName; ?> gói dịch vụ
                </h2>
            </div>
            <div class="user_content" data-uk-grid-margin>
                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin="">
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>" >
                                        <label>Tên dịch vụ</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_name',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $infoPK['service_name'] ) ? $infoPK['service_name'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Giá tiền ( vnđ )</label>
                                        <?php
                                            echo $self->renderInput( [
                                                'name'  => 'avt_service_price',
                                                'type'  => 'text',
                                                'class' => 'md-input masked_input avt-required-js',
                                                'value' => isset( $infoPK['service_price'] ) ? $infoPK['service_price'] : '',
                                                'attr' => [
                                                        'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'",
                                                        'data-inputmask-showmaskonhover' => 'false'
                                                    ]
                                            ] );
                                        ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Giới hạn post / Ngày</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_post',
                                                    'type'  => 'text',
                                                    'class' => 'md-input',
                                                    'value' => isset( $meta['post_limit'] ) ? $meta['post_limit'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div><br>
                            </div>
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Số like</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_like',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $meta['service_like'] ) ? $meta['service_like'] : ''
                                                ] );
                                            ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper <?php echo $input_filled; ?>">
                                        <label>Số comment</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_service_comment',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js',
                                                    'value' => isset( $meta['service_comment'] ) ? $meta['service_comment'] : ''
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
                        if( !empty( $infoPK ) ) {
                            echo $self->renderInput( 
                                array( 
                                    'name' => 'avt_service_id', 
                                    'type' => 'hidden', 
                                    'value' => $infoPK['id']
                                ) 
                            );
                            View(
                                $addButton,
                                [
                                    'link' => url('/user-tool/add-packet-service'),
                                    'title' => 'packet service'
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
registerScrips( [ 'page-service' => assets('frontend/js/page-service-debug.js') ] );
