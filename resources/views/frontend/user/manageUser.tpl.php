<div id="avt-page-handle-user">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Users Management</h3>
            <?php View('frontend/user/layout/manageUserFilter.tpl', [ 'mdUser' => $mdUser ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-text-center uk-text-nowrap">#</th>
                        <th class="uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-text-center uk-text-nowrap">Email</th>
                        <th class="uk-text-center uk-text-nowrap">Role</th>
                        <th class="uk-text-center uk-text-nowrap">Tiền</th>
                        <th class="uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-user-not-js">
                        <?php 
                            $i = 1;
                            foreach ($listUser as $value): ?>
                        <tr class="atl-user-item-<?php echo $value['id'] ?> uk-text-center">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?php echo $value['user_name'] ?>
                            </td>
                            <td>
                                <?php echo $value['user_email'] ?>
                            </td>
                            <td>
                                <span class="uk-badge <?php echo ('admin' == $mdUser->getMetaData( $value['id'], 'user_role' ) ? 'uk-badge-danger': '') ?>">
                                    <?php echo $mdUser->getRoleUser( $mdUser->getMetaData( $value['id'], 'user_role' ) ) ?>
                                </span>
                            </td>
                            <td><?php echo $helpPrice->formatPrice( $value['user_money'] ); ?></td>
                            <td>
                                <a href="<?php echo url('/user-tool/edit-user/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-user-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            $i++;
                        endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-user-js"></tbody>
                </table>
            </div>
            <br>
        <?php
            View( $manageAction );
            echo $pagination;
        ?>
        </div>
        <?php 
            View(
                $addButton,
                [
                    'link' => url('/user-tool/add-user'),
                    'title' => 'user'
                ]
            );
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-user' => assets('frontend/js/page-user.min.js')
    ) );
