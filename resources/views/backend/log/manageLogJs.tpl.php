<?php foreach ($listLog as $value) : ?>
    <tr class="atl-log-item-<?php echo $value['id'] ?>">
        <td class="uk-text-center">
            <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
        </td>
        <td><?php echo $value['logs'] ?></td>
        <td class="uk-text-nowrap">
            <a  class="atl-manage-log-delete-js" data-id="<?php echo $value['id'] ?>">
                <i class="md-icon material-icons">delete</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
