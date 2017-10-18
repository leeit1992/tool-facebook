<div id="atl-page-handle-driver">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Drivers Management</h3>
            <?php View('backend/driver/layout/manageDriverFilter.tpl', [ 'mdDriver' => $mdDriver ]); ?>
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
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Phone</th>
                        <th class="uk-width-2-5 uk-text-center uk-text-nowrap">Location</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-driver-not-js">
                        <?php foreach ($listDriver as $value): ?>
                        <tr class="atl-driver-item-<?php echo $value['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>"/>
                            </td>
                            <td class="uk-text-center">
                                <?php
                                    $driver_avatar = $mdDriver->getMetaData( $value['id'], 'driver_avatar' );
                                    $driver_avatar = !empty($driver_avatar)?$driver_avatar:'/public/backend/assets/img/user.png';
                                ?>
                                <img class="md-user-image" style="height: 34px;" src="<?php echo url($driver_avatar); ?>">
                            </td>
                            <td class="uk-text-center">
                                <?php echo isset($value['service_name'])?$value['service_name']:'' ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $driverPhone = $mdDriver->getMetaData( $value['id'], 'driver_phone' );
                                    echo isset($driverPhone)?$driverPhone:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <?php
                                    $listDriverLocation = json_decode($mdDriver->getMetaData( $value['id'], 'driver_location' ));
                                    $driverLocation = [];
                                    foreach ($listDriverLocation as $lDL) {
                                        $driverLocation[] = $lDL->key;
                                    }
                                    $text = '';
                                    foreach ($locations as $loca) {
                                        if( !empty( $driverLocation ) ) {;
                                            if( in_array( $loca['id'], $driverLocation ) ) {
                                                $text .= $loca['location_name'].', ';
                                            }
                                        }
                                    }
                                    echo trim($text,', ');
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-driver/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a class="atl-manage-driver-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-driver-js"></tbody>
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
                    'link' => url('/atl-admin/add-driver'),
                    'title' => 'driver'
                ]
            );
        ?>
    </div>  
</div>

<?php 
registerScrips( array(
    'page-admin-driver' => assets('backend/js/page-admin-driver.min.js'),
) );
