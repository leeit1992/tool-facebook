<?php foreach ($partners as $partner) : ?>
    <tr class="atl-partner-item-<?php echo $partner['id'] ?>">
        <tr class="atl-partner-item-<?php echo $partner['id'] ?>">
            <td class="uk-text-center">
                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $partner['id'] ?>" />
            </td>
            <td class="uk-text-center">
                <?php echo $partner['partner_name'] ?>
            </td>
           <td class="uk-text-center">
               <?php
                    $service = (array) json_decode($partner['partner_service']);
                    $text ='';
                    foreach ($service as $val) {
                        if (!empty($val->name)) {
                            $text .= $val->name.' - ';
                        }
                    }
                    echo trim($text,' - ');
               ?>
           </td>
            <td class="uk-text-center">
                <a href="<?php echo url('/atl-admin/edit-partner/' . $partner['partner_id']) ?>">
                    <i class="md-icon material-icons">edit</i>
                </a>
                <a href="#" class="atl-manage-partner-delete-js" data-id="<?php echo $partner['partner_id'] ?>">
                    <i class="md-icon material-icons">delete</i>
                </a>
            </td>
        </tr>
    </tr>
<?php endforeach; ?>
