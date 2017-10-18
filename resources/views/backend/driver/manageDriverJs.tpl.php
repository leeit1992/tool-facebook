<?php foreach ($drivers as $driver) : ?>
    <tr class="atl-driver-item-<?php echo $driver['service_id'] ?>">
        <td class="uk-text-center">
            <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $driver['service_id'] ?>"/>
        </td>
        <td class="uk-text-center">
            <?php
                $driver_avatar = isset($driver['driver_avatar'])?$driver['driver_avatar']:'';
            ?>
            <?php if (!empty($driver_avatar)): ?>
                <img class="md-user-image" style="height: 34px;" src="<?php echo url($driver_avatar); ?>">
            <?php endif ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($driver['service_name'])?$driver['service_name']:'' ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($driver['driver_phone'])?$driver['driver_phone']:''; ?>
        </td>
        <td class="uk-text-center">
            <?php
                $listDriverLocation = json_decode($driver['driver_location']);
                $driverLocation = [];
                foreach ($listDriverLocation as $lGL) {
                    $driverLocation[] = $lGL->key;
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
            <a href="<?php echo url('/atl-admin/edit-driver/' . $driver['service_id']) ?>">
                <i class="md-icon material-icons">edit</i>
            </a>
            <a class="atl-manage-driver-delete-js" data-id="<?php echo $driver['service_id'] ?>">
                <i class="md-icon material-icons">delete</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
