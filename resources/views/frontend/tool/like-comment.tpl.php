<div class="md-card pita-page-like-comment">
    <div class="md-card-content">
        <h3 class="heading_a">Tăng LIKE + COMMENT bài viết.</h3>
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
                	<h3 class="heading_a">Gói dịch vụ like + comment</h3>
                	<br>
                	<div class="parsley-row">
                        <select id="pita-like-comment-number" required data-md-selectize>
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
                <input type="hidden" class="avt_like_number">
                <input type="hidden" class="avt_comment_number">
                <div class="uk-form-row">
                	<h3 class="heading_a">Thời Gian (ms)</h3>
                    <div class="md-input-wrapper">
                        <input type="text" class="md-input pita-setinteval" disabled>
                        <span class="md-input-bar"></span>
                    </div>
                    <span class="uk-form-help-block">Khoảng cách giữa các like. 2000ms = 2s, nên để 2s/1 Like. </span>
                </div>
                <div class="uk-form-row">
                    <span class="avt-message-limit uk-text-bold uk-text-danger" data-stt="" ></span><br>
                	<a class="md-btn md-btn-primary pita-start-action" type="button" href="#">Thực Hiện</a>
                </div>
            </div>
        </div>
    </div>
    <?php View('frontend/layout/loadActionDouble.tpl'); ?>
</div>
<?php 
registerScrips( array(
    'handle-like-comment' => assets('frontend/js/page-like-comment-debug.js'),
) );
