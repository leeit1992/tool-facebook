<?php foreach ($offices as $office) : ?>
    <tr class="atl-office-item-<?php echo $office['office_id'] ?>">
        <td class="uk-text-center">
            <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $office['office_id'] ?>" />
        </td>
        <td class="uk-text-center">
            <?php echo isset($office['office_name'])?$office['office_name']:''?>
        </td>
        <td class="uk-text-center">
            <?php 
                $officeCity = !empty($office['office_city']) ? json_decode($office['office_city']) : array();
                foreach ($officeCity as $oC) {
                    echo $oC->name;
                }
            ?>
        </td>
        <td class="uk-text-center">
            <?php 
                $officeCountry = !empty($office['office_country']) ? json_decode($office['office_country']) : array(); 
                foreach ($officeCountry as $oC) {
                    echo $oC->name;
                }
            ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($office['office_phone'])?$office['office_phone']:'' ?>
        </td>
        <td class="uk-text-center">
            <?php echo isset($office['office_email'])?$office['office_email']:'' ?>
        </td>
        <td class="uk-text-center">
            <a href="<?php echo url('/atl-admin/edit-office/' . $office['office_id']) ?>">
                <i class="md-icon material-icons">edit</i>
            </a>
            <a class="atl-manage-office-delete-js" data-id="<?php echo $office['office_id'] ?>">
                <i class="md-icon material-icons">delete</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
