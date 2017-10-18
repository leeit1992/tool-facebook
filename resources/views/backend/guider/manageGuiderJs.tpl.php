<?php foreach ($guiders as $guider) : ?>
    <tr class="atl-guider-item-<?php echo $guider['service_id'] ?>">
        <td class="uk-text-center">
            <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $guider['service_id'] ?>"/>
        </td>
        <td class="uk-text-center">
            <?php
                $guider_avatar = isset($guider['guider_avatar'])?$guider['guider_avatar']:'';
            ?>
            <?php if (!empty($guider_avatar)): ?>
                <img class="md-user-image" style="height: 34px;" src="<?php echo url($guider_avatar); ?>">
            <?php endif ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($guider['service_name'])?$guider['service_name']:'' ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($guider['guider_email'])?$guider['guider_email']:''; ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($guider['guider_phone'])?$guider['guider_phone']:''; ?>
        </td>
        <td class="uk-text-center">
            <?php
                $listGuiderLocation = json_decode($guider['guider_location']);
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
            <?php echo isset($guider['guider_language'])?$guider['guider_language']:''; ?>
        </td>
        <td class="uk-text-center">
            <a href="<?php echo url('/atl-admin/edit-guider/' . $guider['service_id']) ?>">
                <i class="md-icon material-icons">edit</i>
            </a>
            <a class="atl-manage-guider-delete-js" data-id="<?php echo $guider['service_id'] ?>">
                <i class="md-icon material-icons">delete</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>