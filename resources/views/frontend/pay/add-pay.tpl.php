<div id="avt-page-handle-pay">
    <form action="<?php echo url('/user-tool/validate-pay'); ?>" id="avt-form-pay" method="POST">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-1-1">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <h2 class="heading_b">
                            <span class="uk-text-truncate" style="color: white;"><?php echo $actionName ?></span>
                        </h2>
                    </div>
                    <div class="user_content" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Ngân hàng</label>
                                <?php
                                    echo $self->renderInput( [
                                            'name'  => 'avt_bank_name',
                                            'type'  => 'text',
                                            'class' => 'md-input avt-required-js',
                                            'value' => isset( $pay['bank_name'] ) ? $pay['bank_name'] : ''
                                        ] );
                                ?>
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Tên chủ khoản</label>
                                <?php
                                    echo $self->renderInput( [
                                            'name'  => 'avt_bank_user_name',
                                            'type'  => 'text',
                                            'class' => 'md-input avt-required-js',
                                            'value' => isset( $pay['bank_user_name'] ) ? $pay['bank_user_name'] : ''
                                        ] );
                                ?>
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Số tài khoản</label>
                                <?php
                                    echo $self->renderInput( [
                                            'name'  => 'avt_bank_number',
                                            'type'  => 'text',
                                            'class' => 'md-input avt-required-js',
                                            'value' => isset( $pay['bank_number'] ) ? $pay['bank_number'] : ''
                                        ] );
                                ?>
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Địa chỉ /  Chi nhánh</label>
                                <?php
                                    echo $self->renderInput( [
                                            'name'  => 'avt_bank_address',
                                            'type'  => 'text',
                                            'class' => 'md-input avt-required-js',
                                            'value' => isset( $pay['bank_address'] ) ? $pay['bank_address'] : ''
                                        ] );
                                ?>
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <button type="submit" class="md-btn md-btn-primary">Thêm</button>
                        </div>
                        <?php 
                            if( !empty( $pay ) ) {
                                echo $self->renderInput( 
                                    array( 
                                        'name' => 'atl_pay_id', 
                                        'type' => 'hidden', 
                                        'value' => $pay['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/user-tool/add-pay'),
                                        'title' => 'pay'
                                    ]
                                );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( [ 'page-pay' => assets('frontend/js/page-pay-debug.js') ] );
