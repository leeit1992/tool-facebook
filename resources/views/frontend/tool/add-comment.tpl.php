<div class="md-card pita-page-comment">
    <div class="md-card-content">
        <h3 class="heading_a">Auto COMMENTS bài viết.</h3>
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-1-1">
                <div class="uk-form-row">
                    <h3 class="heading_a">ID Bài Viết</h3>
                    <div class="md-input-wrapper">
                        <input type="password" class="md-input"><span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Để lấy Post ID <a target="_blank" href="http://findpostid.com/">Click</a> Đây. </span>
                </div>
                <div class="uk-form-row">
                    <h3 class="heading_a">Nội Dung Comment.</h3>
                    <div class="md-input-wrapper md-input-filled">
                        <textarea cols="30" rows="4" class="md-input"></textarea>
                        <span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Ngăn cách các comment bằng cách xuống dòng.  </span>
                    <span class="uk-form-help-block">Mẫu comment nữ: Hàng tốt quá | Nữ.  </span>
                    <span class="uk-form-help-block">Mẫu comment nam: Hàng đẹp quá | Nam.  </span>
                </div>
                <div class="uk-form-row">
                    <h3 class="heading_a">Gói dịch vụ COMMENT</h3>
                    <br>
                    <div class="parsley-row">
                        <select id="pita-like-number" required data-md-selectize>
                            <?php foreach ($services as $value): ?>
                                <option value="<?php echo $value['id'] ?>">
                                    <?php echo $value['service_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="uk-form-row">
                    <h3 class="heading_a">Thời Gian (ms)</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input pita-setinteval" value="2000"><span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Khoảng cách giữa các comments. 2000ms = 2s, nên để 2s/1 comment. </span>
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
    'handle-comment' => assets('frontend/js/page-comment-debug.js'),
) );