<div id="avt-page-handle-service">
    <form action="<?php echo url('/user-tool/validate-packet-service') ?>" method="post" id="avt-form-service" enctype="multipart/form-data">
        <div class="md-card">
            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                    <h2 class="heading_b">
                        <span class="uk-text-truncate" style="color: white;"><?php echo $actionName; ?> gói dịch vụ</span>
                    </h2>
            </div>
            <div class="user_content" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <div class="uk-form-row">
                    	<h3 class="heading_a">Số like</h3>
                        <div class="md-input-wrapper">
                            <?php
                                echo $self->renderInput( [
                                        'name'  => 'avt_number_like',
                                        'type'  => 'text',
                                        'class' => 'md-input avt-required-js',
                                        'value' => isset( $infoPK['number_like'] ) ? $infoPK['number_like'] : ''
                                    ] );
                            ?>
                            <span class="md-input-bar"></span>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <h3 class="heading_a">Số comment</h3>
                        <div class="md-input-wrapper">
                            <?php
                                echo $self->renderInput( [
                                        'name'  => 'avt_number_comment',
                                        'type'  => 'text',
                                        'class' => 'md-input avt-required-js',
                                        'value' => isset( $infoPK['number_comment'] ) ? $infoPK['number_comment'] : ''
                                    ] );
                            ?>
                            <span class="md-input-bar"></span>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <h3 class="heading_a">Giá tiền ( vnđ )</h3>
                        <div class="md-input-wrapper">
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
                        <button type="submit" class="md-btn md-btn-primary"><?php echo $actionName; ?></button>
                    </div>
                    <?php 
                        if( !empty( $infoPK ) ) {
                            echo $self->renderInput( 
                                array( 
                                    'name' => 'avt_id', 
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
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( [ 'page-service' => assets('frontend/js/page-service-debug.js') ] );
