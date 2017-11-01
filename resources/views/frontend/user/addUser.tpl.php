<div id="avt-page-handle-user">
    <form action="<?php echo url('/user-tool/validate-user') ?>" method="post" id="avt-form-user" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <?php 
                        View(
                            'frontend/user/layout/addUserHead.tpl', 
                            ['actionName' => $actionName, 'meta' => $meta, 'mdUser' => $mdUser, 'self' => $self] 
                        );
                    ?>
                    <div class="user_content">
                        <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                            <?php if( empty( $user ) ) : ?>
                            <li class="uk-active"><a href="#">Account</a></li>
                            <li><a href="#">Basic</a></li>
                            <?php endif;  ?>
                            <?php if( !empty( $user ) ) : ?>
                            <li class="uk-active"><a href="#">Basic</a></li>
                            <li><a href="#">Account</a></li>
                            <?php endif;  ?>
                        </ul>
                        <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                            <?php 
                                if( empty( $user ) )  {
                                    View('frontend/user/layout/addUserAccount.tpl', ['user' => $user] );
                                    View('frontend/user/layout/addUserBasic.tpl', 
                                        ['meta' => $meta, 'user' => $user, 'social' => $social] 
                                    );
                                }else{
                                    View('frontend/user/layout/addUserBasic.tpl', 
                                        ['meta' => $meta, 'user' => $user, 'social' => $social]
                                    );
                                    View('frontend/user/layout/addUserAccount.tpl', ['user' => $user] );
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_c uk-margin-medium-bottom">Other settings</h3>
                        <div class="uk-form-row">
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name' => 'atl_user_status', 
                                        'type' => 'checkbox', 
                                        'class' => 'atl-required-js',
                                        'value' => 1,
                                        'attr' => array(
                                            'id' => 'user_edit_active',
                                            'data-switchery' => '',
                                            isset( $user['user_status'] ) ? checked( 1, $user['user_status'] ) : '' => ''
                                        )
                                    ) 
                                ); 
                            ?>
                            <label for="user_edit_active" class="inline-label">User Active</label>
                        </div>
                        <hr class="md-hr">
                        <div class="uk-form-row">
                            <h3 class="heading_c uk-margin-bottom">User Role</h3>
                            <select data-md-selectize name="atl_user_role">
                                <?php foreach ($mdUser->getRoleUser() as $key => $value) {
                                    $selected = isset( $meta['user_role'] ) ? selected($meta['user_role'], $key) : '';
                                    echo '<option ' . $selected . ' value="' . $key . '">' . $value . ' </option>';
                                } ?>
                            </select>
                        </div>
                        <hr class="md-hr">
                        <div class="uk-form-row">
                            <h3 class="heading_c">Money (VNĐ)</h3>
                            <?php
                                echo $self->renderInput( 
                                    array( 
                                        'type'  => 'text',
                                        'name'  => 'atl_user_money', 
                                        'class' => 'md-input masked_input',
                                        'value' => isset( $user['user_money'] ) ? $user['user_money'] : '',
                                        'attr' => [
                                                    'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'",
                                                    'data-inputmask-showmaskonhover' => 'false'
                                                ]
                                    )
                                ); 
                            ?>
                        </div>
                        <?php 
                            if( !empty( $user ) ) {
                                echo $self->renderInput( 
                                    array( 
                                        'name' => 'atl_user_id', 
                                        'type' => 'hidden', 
                                        'value' => $user['id']
                                    ) 
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
registerScrips( array(
    'page-user' => assets('frontend/js/page-user.min.js')
) );
