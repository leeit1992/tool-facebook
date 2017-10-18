<?php foreach ($OtherServices as $otherservice) : ?>
    <tr class="atl-otherservice-item-<?php echo $otherservice['id'] ?>">
        <td class="uk-text-center">
            <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $otherservice['id'] ?>"/>
        </td>
        <td class="uk-text-center">
            <?php
                $otherservice_feature = $mdOtherService->getMetaData( $otherservice['id'], 'otherservice_feature' );
                $otherservice_feature = !empty($otherservice_feature)?$otherservice_feature:'/public/backend/assets/img/user.png';
            ?>
            <img class="md-user-image" style="height: 34px;" src="<?php echo url($otherservice_feature); ?>">
        </td>
        <td class="uk-text-center">
            <?php echo isset($otherservice['service_name'])?$otherservice['service_name']:''; ?>
        </td>
        <td class="uk-text-center">
            <?php 
                $os_partner = $mdOtherService->getMetaData( $otherservice['id'], 'otherservice_partner' );
                foreach ($partners as $partner) {
                    if ($os_partner == $partner['id']) {
                        echo $partner['partner_name'];
                    }
                }
            ?>
        </td>
        <td class="uk-text-center">
            <?php $os_price = $mdOtherService->getMetaData( $otherservice['id'], 'otherservice_price' );
                echo  isset($os_price)?$os_price:'';
            ?>
        </td>
        <td class="uk-text-center">
            <a href="<?php echo url('/atl-admin/edit-otherservice/' . $otherservice['id']) ?>">
                <i class="md-icon material-icons">edit</i>
            </a>
            <a class="atl-manage-otherservice-delete-js" data-id="<?php echo $otherservice['id'] ?>">
                <i class="md-icon material-icons">delete</i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
