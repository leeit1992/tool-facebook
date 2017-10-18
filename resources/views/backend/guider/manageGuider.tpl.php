<div id="atl-page-handle-guider">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Guiders Management</h3>
            
            <?php View('backend/guider/layout/manageGuiderFilter.tpl', [ 'mdGuider' => $mdGuider ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
                <table class="uk-table atl-table-hover">
                    <thead class="atl-table-background">
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-text-center">Avatar</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Email</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Phone</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Location</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Language</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-guider-not-js">
                        <?php foreach ($listGuider as $value): ?>
                        <tr class="atl-guider-item-<?php echo $value['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>"/>
                            </td>
                            <td class="uk-text-center">
                                <?php
                                    $guider_avatar = $mdGuider->getMetaData( $value['id'], 'guider_avatar' );
                                    $guider_avatar = !empty($guider_avatar)?$guider_avatar:'/public/backend/assets/img/user.png';
                                ?>
                                <img class="md-user-image" style="height: 34px;" src="<?php echo url($guider_avatar); ?>">
                            </td>
                            <td class="uk-text-center">
                                <?php echo isset($value['service_name'])?$value['service_name']:'' ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $guiderEmail = $mdGuider->getMetaData( $value['id'], 'guider_email' );
                                    echo isset($guiderEmail)?$guiderEmail:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $guiderPhone = $mdGuider->getMetaData( $value['id'], 'guider_phone' );
                                    echo isset($guiderPhone)?$guiderPhone:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <?php
                                    $listGLJson = $mdGuider->getMetaData( $value['id'], 'guider_location' );
                                    $listGuiderLocation = !empty($listGLJson) ? json_decode($listGLJson) : array();
                                    $guiderLocation = [];
                                    foreach ($listGuiderLocation as $lGL) {
                                        $guiderLocation[] = $lGL->key;
                                    }
                                    $text = '';
                                    foreach ($locations as $loca) {
                                        if( !empty( $guiderLocation ) ) {;
                                            if( in_array( $loca['id'], $guiderLocation ) ) {
                                                $text .= $loca['location_name'].', ';
                                            }
                                        }
                                    }
                                    echo trim($text,', ');
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $guiderLanguage = $mdGuider->getMetaData( $value['id'], 'guider_language' );
                                    echo isset($guiderLanguage)?$guiderLanguage:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-guider/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a class="atl-manage-guider-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-guider-js"></tbody>
                </table>
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
                    'link' => url('/atl-admin/add-guider'),
                    'title' => 'guider'
                ]
            );
         ?>
    </div>  
</div>

<?php 
registerScrips( array(
    'page-admin-guider' => assets('backend/js/page-admin-guider.min.js'),
) );
