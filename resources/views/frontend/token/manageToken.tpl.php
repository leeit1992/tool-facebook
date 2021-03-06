<div id="page-manage-token" class="md-card uk-margin-medium-bottom">
    <form action="<?php echo url('/user-tool/upload-token-fb') ?>" id="atl-form-file" class="uk-form-stacked" method="POST">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-1-1">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">
                            Upload danh sách token
                            <span class="sub-heading">File chứa token.</span>
                        </h3>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <input type="file" name="atl-upload-file">
                            </div><hr><br>
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary atl-choose-file-js">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <ul class="uk-tab uk-tab-grid">
                <li class="uk-width-1-3"><a href="<?php echo url('/user-tool/manage-token') ?>" class="uk-text-small">Toàn bộ token (<?php echo ($countAll) ?>)</a></li>
                <li class="uk-width-1-3"><a href="<?php echo url('/user-tool/manage-token/type/1') ?>" class="uk-text-small">Token Live (<span class="avt-c-token-live"><?php echo ($countTokenLive) ?></span>)</a></li>
                <li class="uk-width-1-3"><a href="<?php echo url('/user-tool/manage-token/type/2') ?>" class="uk-text-small">Token Die (<span class="avt-c-token-die"><?php echo ($countTokenDie) ?></span>)</a></li>
            </ul>

            <!-- <div class="avt-load-page">
                <code class="uk-text-primary">1%</code>
                <div class="uk-progress uk-progress-mini uk-margin-remove">
                    <div class="uk-progress-bar"></div>
                </div>
                <input type="hidden" id="progress_width" value="0">
            </div>  -->

            <table class="uk-table">
                <h3>Danh sách Token</h3>
                <thead>
                    <tr>
                        <td colspan="6"><button class="md-btn avt-action-filter">Lọc token live</button></td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td>
                            <input type="checkbox" data-md-icheck="">
                        </td>
                        <th>Tài khoản</th>
                        <th>UID</th>
                        <th>Access Token</th>
                        <th>Token status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listToken as $value): ?>
                    <tr>
                        <td>
                            <input type="checkbox" data-md-icheck="">
                        </td>
                        <td><?php echo $value['account'] ?></td>
                        <td><?php echo $value['fb_id'] ?></td>
                        <td>
                            <div style="width: 300px; overflow: auto;">
                                <code class="<?php echo (1 == $value['token_status']) ? 'uk-text-primary' : 'uk-text-danger' ?>">
                                <?php echo $value['token'] ?>
                                </code>
                            </div>
                        </td>
                        <td>
                            <code class="<?php echo (1 == $value['token_status']) ? 'uk-text-primary' : 'uk-text-danger' ?>"><?php echo (1 == $value['token_status']) ? 'Live' : 'Die' ?></code>
                        </td>
                        <td>
                            <a href=""><i class="uk-icon-remove"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"><button class="md-btn avt-action-filter">Lọc token live</button></td>
                    </tr>
                </tfoot>
            </table>
             <?php echo $pagination; ?>

            
            

            <!-- <div class="dt-uikit-footer">
                <div class="uk-grid">

                    <div class="uk-width-medium-1-1">
                        <div class="simple_numbers" id="dt_default_paginate">
                            <ul class="uk-pagination">
                                <li class="paginate_button previous uk-disabled" id="dt_default_previous"><a href="#" aria-controls="dt_default" data-dt-idx="0" tabindex="0">Previous</a></li>
                                <li class="paginate_button uk-active"><a href="#" aria-controls="dt_default" data-dt-idx="1" tabindex="0">1</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="2" tabindex="0">2</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="3" tabindex="0">3</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="4" tabindex="0">4</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="5" tabindex="0">5</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="6" tabindex="0">6</a></li>
                                <li class="paginate_button next" id="dt_default_next"><a href="#" aria-controls="dt_default" data-dt-idx="7" tabindex="0">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>

    <div class="avt-filter-token-live">
        <span class="avt-has-filter" data-start="0">0</span>/<span class="avt-total-token-check" data-total="<?php echo ($countAll) ?>"><?php echo ($countAll) ?></span>
        <div class="uk-progress uk-margin-remove" style="border: 1px solid">
            <div class="uk-progress-bar avt-total-token-check-bar" style="width: 1%;"></div>
        </div>
    </div>
    <div class="avt-upload-token-live">
        <span class="avt-has-filter" data-start="0">0</span>/<span class="avt-total-token-check" data-total="0">0</span>
        <div class="uk-progress uk-margin-remove" style="border: 1px solid">
            <div class="uk-progress-bar avt-total-token-check-bar" style="width: 1%;"></div>
        </div>
    </div>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify=""></div>
</div>

<?php 
registerScrips( array(
    'manage-token' => assets('frontend/js/page-manage-token-debug.js'),
) );
