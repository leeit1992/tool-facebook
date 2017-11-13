<div id="avt-page-buy-share">
    <form action="<?php echo url('/user-tool/validate-buy-share'); ?>" id="avt-form-buy-share" method="POST">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <h2 class="heading_b">
                            <span class="uk-text-truncate" style="color: white;">Mua gói share</span>
                        </h2>
                    </div>
                    <div class="user_content" data-uk-grid-margin>
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <label>Chọn gói share</label>
                                    <select name="avt_buy_packet" data-md-selectize>
                                        <?php foreach ($listShare as $value): ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['service_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Tốc độ share/Phút</label>
                                    <input type="text" name="avt_buy_speed" data-ion-slider data-min="1" data-max="100" data-from="50" />
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
                            Chi tiết gói LIKE
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <table class="uk-table uk-table-condensed">
                            <thead>
                                <tr>
                                    <th class="uk-text-center uk-text-nowrap">Gói LIKE</th>
                                    <th class="uk-text-center uk-text-nowrap">VNĐ/Tháng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listShare as $value): ?>
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
registerScrips( [ 'page-buy-share' => assets('frontend/js/page-buy-share-debug.js') ] );
