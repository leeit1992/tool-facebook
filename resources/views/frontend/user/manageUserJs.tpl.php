<?php 
    $i = 1;
    foreach ($users as $value): ?>
        <tr class="atl-user-item-<?php echo $value['id'] ?> uk-text-center">
            <td class="uk-text-center">
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
