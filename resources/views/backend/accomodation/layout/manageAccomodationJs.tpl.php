<?php foreach ($listAccomodation as $value): ?>
<tr class="atl-acm-item-<?php echo $value['id'] ?>">
    <td>
        <input type="checkbox" class="atl-checkbox-child-js"  value="<?php echo $value['id'] ?>" />
    </td>
    <td class="uk-text-center">
        <img  style="height: 50px;" src="<?php echo url( $value['acmdt_feature_image']) ?>">
    </td>
    <td class="uk-text-left">
       <?php echo $value['service_title'] ?>
    </td>

    <td class="uk-text-center">
       <?php echo $value['acmdt_star'] ?>
       <i class="uk-icon-star-o"></i>
    </td>
    <td class="uk-text-center">
       <?php 
            $infoUser = $mdUser->getUserby( 'id', $value['service_author'] );

            if( !empty( $infoUser ) ) {
                echo '<a target="__blank" href="' . url('/atl-admin/edit-accomodation/' . $value['service_author']) . '" >' . ucfirst( $infoUser[0]['user_name'] ) . '</a>';
            }
       ?>
    </td>
    <td class="uk-text-center">
        <a href="<?php echo url('/atl-admin/edit-accomodation/' . $value['id']) ?>">
            <i class="md-icon material-icons">edit</i>
        </a>
        <a href="#" class="atl-manage-accomodation-delete-js" data-id="<?php echo $value['id'] ?>">
            <i class="md-icon material-icons">delete</i>
        </a>
    </td>
</tr>
<?php endforeach; ?>