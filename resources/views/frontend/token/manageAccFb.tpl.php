<div>
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
                                <input class="md-input" type="text" name="avt_user_name_fb" />
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Mật khẩu</label>
                                <input class="md-input" type="text" name="avt_password_fb" />
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1">
                            <button class="md-btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div id="page-manage-acc-fb">
        <form action="<?php echo url('/user-tool/upload-acc-fb') ?>" id="atl-form-file" class="uk-form-stacked" method="POST">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-1">
                    <div class="md-card">
                        <div class="md-card-content">
                        <span class="uk-text-success uk-text-bold atl-message-success"></span>
                        <span class="uk-text-danger uk-text-bold atl-message-danger"></span>
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
    </div>
    
    <hr>
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table">
                    <h3>Danh sách tài khoản</h3>
                    <thead>
                        <tr>
                            <td>
                                <input type="checkbox" data-md-icheck="">
                            </td>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>UID</th>
                            <th>Giới tính</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listAccount as $value): ?>
                        <tr>
                            <td>
                                <input type="checkbox" data-md-icheck="">
                            </td>
                            <td><?php echo $value['account'] ?></td>
                            <td><?php echo $value['password'] ?></td>
                            <td><?php echo $value['fb_id'] ?></td>
                             <td><?php echo ( 'male' == $value['gender'] ) ? 'Nam' : 'Nữ'  ?></td>
                            <td>
                                <a href=""><i class="uk-icon-edit"></i></a> | 
                                <a href=""><i class="uk-icon-remove"></i></a>
                            </td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
    registerScrips( [ 'manage-acc-fb' => assets('frontend/js/page-manage-acc-fb-debug.js') ] );
