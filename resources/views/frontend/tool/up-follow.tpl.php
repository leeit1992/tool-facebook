<div class="md-card pita-page-follow">
    <div class="md-card-content">
        <h3 class="heading_a">Tăng Follow.</h3>
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                	<h3 class="heading_a">ID Người Dùng</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input"><span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Để lấy ID <a target="_blank" href="https://findmyfbid.com/">Click</a> Đây. </span>
                </div>

                <div class="uk-form-row">
                    <h3 class="heading_a">Số Lượng</h3>
                    <br>
                    <div class="parsley-row">
                        <select id="pita-like-number" required data-md-selectize>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                </div>
                <div class="uk-form-row">
                    <h3 class="heading_a">Thời Gian (ms)</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input pita-setinteval" value="2000"><span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Khoảng cách giữa các flollow. 2000ms = 2s, nên để 2s/1 flollow. </span>
                </div>
                <div class="uk-form-row">
                    <a class="md-btn md-btn-primary pita-start-action" href="#">Thực Hiện</a>
                </div>
            </div>
        </div>
    </div>
<?php View('frontend/layout/loadAction.tpl'); ?>
</div>

<?php 
registerScrips( array(
    'handle-follow' => assets('frontend/js/page-follow-debug.js'),
) );