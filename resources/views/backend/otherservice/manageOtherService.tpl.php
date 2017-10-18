<div id="atl-page-handle-otherservice">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Other Service Management</h3>
            
            <?php View('backend/otherservice/layout/manageOtherServiceFilter.tpl', [ 'mdOtherService' => $mdOtherService , 'partners' => $partners ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
                <table class="uk-table atl-table-hover">
                    <thead class="atl-table-background">
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-text-center uk-text-nowrap">Image</th>
                        <th class="uk-width-2-5 uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Partner</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Price (USD)</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-otherservice-not-js">
                        <?php foreach ($listOtherService as $value): ?>
                        <tr class="atl-otherservice-item-<?php echo $value['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>"/>
                            </td>
                            <td class="uk-text-center">
                                <?php
                                    $otherservice_feature = $mdOtherService->getMetaData( $value['id'], 'otherservice_feature' );
                                    $otherservice_feature = !empty($otherservice_feature)?$otherservice_feature:'/public/backend/assets/img/user.png';
                                ?>
                                <img class="md-user-image" style="height: 34px;" src="<?php echo url($otherservice_feature); ?>">
                            </td>
                            <td class="uk-text-center">
                                <?php echo isset($value['service_name'])?$value['service_name']:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $os_partner = $mdOtherService->getMetaData( $value['id'], 'otherservice_partner' );
                                    foreach ($partners as $partner) {
                                        if ($os_partner == $partner['id']) {
                                            echo $partner['partner_name'];
                                        }
                                    }
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <?php $os_price = $mdOtherService->getMetaData( $value['id'], 'otherservice_price' );
                                    echo  isset($os_price)?$os_price:'';
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-otherservice/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a class="atl-manage-otherservice-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-otherservice-js"></tbody>
                </table>
            <br>
            <?php
                View( $manageAction );
                echo $pagination;
            ?>
        </div>
        <?php 
            View(
                $addButton,
                [
                    'link' => url('/atl-admin/add-otherservice'),
                    'title' => 'service other'
                ]
            );
    ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-admin-otherservice' => assets('backend/js/page-admin-otherservice.min.js'),
    ) );
