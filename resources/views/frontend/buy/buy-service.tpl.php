<div id="avt-page-buy-service">
    <form action="<?php echo url('/user-tool/validate-buy-service'); ?>" id="avt-form-buy-service" method="POST">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <h2 class="heading_b">
                            <span class="uk-text-truncate" style="color: white;">Mua gói dịch vụ</span>
                        </h2>
                    </div>
                    <div class="user_content" data-uk-grid-margin>
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper">
                                        <label>FB ID</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_buy_fb',
                                                    'type'  => 'text',
                                                    'class' => 'md-input avt-required-js'
                                                ] );
                                        ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <div class="md-input-wrapper">
                                        <label>Tên người dùng</label>
                                        <?php
                                            echo $self->renderInput( [
                                                    'name'  => 'avt_buy_name',
                                                    'type'  => 'text',
                                                    'class' => 'md-input'
                                                ] );
                                        ?>
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <label>Chọn gói dịch vụ</label>
                                    <select name="avt_buy_packet" data-md-selectize>
                                        <?php foreach ($listService as $value): ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['service_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Tốc độ /Phút</label>
                                    <input type="text" name="avt_buy_speed" data-ion-slider data-min="0" data-max="100" data-from="50" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Thời gian sử dụng</label>
                                    <select name="avt_buy_date" data-md-selectize>
                                        <?php for ($i=1; $i <= 12; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?> Tháng</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row uk-text-center">
                            <button type="submit" class="md-btn md-btn-success">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Chi tiết gói dịch vụ
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <table class="uk-table uk-table-condensed">
                            <thead>
                                <tr>
                                    <th class="uk-text-center uk-text-nowrap">Gói dịch vụ</th>
                                    <th class="uk-text-center uk-text-nowrap">VNĐ/Tháng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listService as $value): ?>
                                <tr class="uk-text-center">
                                    <td>
                                        <?php echo $value['service_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format( $value['service_price'],0,",","." ); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( [ 'page-buy-service' => assets('frontend/js/page-buy-service-debug.js') ] );
