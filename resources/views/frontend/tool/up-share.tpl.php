<div class="md-card pita-page-up-share">
    <div class="md-card-content">
        <h3 class="heading_a">Tăng SHARE bài viết.</h3>
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <h3 class="heading_a">ID Bài Viết</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input pita-id-post">
                        <span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Để lấy Post ID <a target="_blank" href="http://findpostid.com/">Click</a> Đây. </span>
                </div>

                <div class="uk-form-row">
                    <h3 class="heading_a">Gói dịch vụ tăng SHARE đã mua</h3>
                    <br>
                    <div class="parsley-row">
                        <select id="pita-share-number" required data-md-selectize>
                            <?php
                            foreach ($services as $value): 
                                $infoPackage = $mdService->getBy('id', $value['buy_packet']);
                            ?>
                                <option value="<?php echo $value['id'] ?>">
                                    <?php echo $infoPackage[0]['service_name'] ?> 
                                    ( <?php echo $value['buy_speed'] ?>p )
                                </option> 
                            <?php endforeach ?> 
                        </select>
                    </div>
                </div>
                <br>
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-medium-1-3">
                        <div class="uk-form-row">
                            <h3 class="heading_a">Số lượt còn lại</h3>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-input avt_total_share" disabled>
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="uk-form-row">
                            <h3 class="heading_a">Số lượt</h3>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-input avt_share_number">
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="uk-form-row">
                    <h3 class="heading_a">Thời Gian (ms)</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input pita-setinteval" disabled><span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Khoảng cách giữa các share. 2000ms = 2s, nên để 2s/1 Like. </span>
                </div>
                <div class="uk-form-row">
                    <span class="avt-message-limit uk-text-bold uk-text-danger"></span><br>
                    <a class="md-btn md-btn-primary pita-start-action" type="button" href="#">Thực Hiện</a>
                </div>
            </div>
        </div>
    </div>
    <?php View('frontend/layout/loadAction.tpl'); ?>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( array(
    'handle-up-share' => assets('frontend/js/page-up-share-debug.js'),
) );
