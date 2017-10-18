<?php foreach ($locations as $value) : ?>
    <tr class="atl-location-item-<?php echo $value['id'] ?>">
        <td> <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>"> <?php echo $value['location_name'] ?></td>
        <td><?php echo $self->mdLocation->typeLocation( $value['location_type'] ) ?></td>
        <td>
            <a href="<?php echo url('/atl-admin/manage-location/' . $value['id']) ?>">
                <i class="md-icon material-icons">&#xE254;</i>
            </a>
            <a href="#" class="atl-manage-location-delete-js" data-id="<?php echo $value['id'] ?>">
                <i class="md-icon material-icons">&#xE872;</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>