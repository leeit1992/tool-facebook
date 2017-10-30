<?php foreach ($pays as $value): ?>
<tr class="atl-pay-item-<?php echo $value['id'] ?> uk-text-center">
    <td>
        <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
    </td>
    <td>
        <?php echo $value['bank_name']; ?>
    </td>
    <td>
        <?php echo $value['bank_user_name']; ?>
    </td>
    <td>
        <?php echo $value['bank_number']; ?>
    </td>
    <td>
        <?php echo $value['bank_address']; ?>
    </td>
    <td>
        <a href="<?php echo url('/user-tool/edit-pay/' . $value['id']) ?>">
            <i class="md-icon material-icons">edit</i>
        </a>
        <a href="#" class="atl-manage-pay-delete-js" data-id="<?php echo $value['id'] ?>">
            <i class="md-icon material-icons">delete</i>
        </a>
    </td>
</tr>
<?php endforeach; ?>
