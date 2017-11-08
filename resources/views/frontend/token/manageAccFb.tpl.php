<div id="page-manage-acc-fb">
    <form action="<?php echo url('/user-tool/facebook-acc-add') ?>" class="uk-form-stacked" method="POST">
        
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-1-1">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_avatar fileinput fileinput-new">
                            
                            <div class="user_avatar_controls">
                                <a href="#" class="btn-file fileinput-exists"><i class="material-icons">&#xE5CD;</i></a>
                            </div>
                        </div>
                        <h2 class="heading_b">
                            <span class="uk-text-truncate" style="color: white;">Tài khoản facebook</span>
                        </h2>
                    </div>
                    <div class="user_content" data-uk-grid-margin>
                        <?php
                            if (!empty($noticeAction)) {
                                if ($noticeAction['type'

                            ]) {
                                    $classNoptice = 'uk-text-success';
                                } else {
                                    $classNoptice = 'uk-text-danger';
                                }
                                ?>
                                <div style="font-size: 18px;">
                                <div class="uk-margin-remove <?php echo $classNoptice ?>" role="alert">
                                <?php
                                    echo $noticeAction['notice'];
                                ?>
                                </div>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Tài khoản</label>
                                <input class="md-input" type="text" name="avt_user_name_fb" value="<?php echo isset( $infoAcc[0]['account'] ) ? $infoAcc[0]['account'] : '' ?>" />
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Mật khẩu</label>
                                <input class="md-input" type="text" name="avt_password_fb" value="<?php echo isset( $infoAcc[0]['password'] ) ? $infoAcc[0]['password'] : '' ?>" />
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <?php 
                                if(isset( $infoAcc[0]['id'] )){
                                    ?>
                                    <input type="hidden" name="avt_acc_id" value="<?php echo $infoAcc[0]['id'] ?>" />
                                    <?php
                                }
                            ?>
                            
                            <button class="md-btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <form action="<?php echo url('/user-tool/upload-acc-fb') ?>" id="atl-form-file" class="uk-form-stacked" method="POST">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-1-1">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">
                            Upload danh sách tài khoản FB
                            <span class="sub-heading">File chứa tài khoản và pass FB.</span>
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
    <?php View('frontend/layout/loadAction.tpl'); ?>
    <hr>
    <div class="md-card uk-margin-medium-bottom">
        <ul class="uk-tab uk-tab-grid">
            <li class="uk-width-1-3 <?php echo (0 == $tabActive) ? 'uk-active' : '' ?>"><a href="<?php echo url('/user-tool/facebook-acc') ?>" class="uk-text-small">Toàn bộ</a></li>
            <li class="uk-width-1-3 <?php echo (1 == $tabActive) ? 'uk-active' : '' ?>"><a href="<?php echo url('/user-tool/facebook-acc/type/1') ?>" class="uk-text-small">Tài khoản đã lấy được token</a></li>
            <li class="uk-width-1-3 <?php echo (2 == $tabActive) ? 'uk-active' : '' ?>"><a href="<?php echo url('/user-tool/facebook-acc/type/2') ?>" class="uk-text-small">Tài khoản chưa lấy được token</a></li>
        </ul>
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table">
                    <h3>Danh sách tài khoản</h3>
                    <?php View( $manageAction ); ?>
                    <thead>
                        <tr>
                            <td>
                                <input type="checkbox" class="avt-facebook-acc-check-primary" data-md-icheck="">
                            </td>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>UID</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Trạng thái</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listAccount as $value): ?>
                        <tr class="avt-fb-acc-item-<?php echo $value['id'] ?>">
                            <td>
                                <input type="checkbox" class="avt-facebook-acc-check-child" value="<?php echo $value['id'] ?>"  data-md-icheck="">
                            </td>
                            <td><?php echo $value['account'] ?></td>
                            <td><?php echo $value['password'] ?></td>
                            <td><?php echo $value['fb_id'] ?></td>
                            
                            <td><?php 
                                if( !empty( $value['gender'] ) ) {
                                    echo ( 'male' == $value['gender'] ) ? 'Nam' : 'Nữ';
                                }
                            ?></td>
                            <td><?php echo $value['birthday'] ?></td>
                            <td>
                    
                                <label class="<?php echo (1 == $value['token_status']) ? 'uk-text-primary' : 'uk-text-danger' ?>">
                                    <?php echo (1 == $value['token_status']) ? 'Oke' : 'Faild' ?>
                                </label>
                          
                            </td>
                            <td>
                                <a href="<?php echo url('/user-tool/facebook-acc/edit/'.$value['id']) ?>"><i class="uk-icon-edit"></i></a> | 
                                <a href="#delete-<?php echo $value['id'] ?>" class="avt-delete-acc" data-id="<?php echo $value['id'] ?>"><i class="uk-icon-remove"></i></a>
                            </td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php View( $manageAction ); ?>
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
    registerScrips( [ 'manage-acc-fb' => assets('frontend/js/page-manage-acc-fb-debug.js') ] );
