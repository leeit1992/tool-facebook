<div id="avt-page-like">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Quản lý gói tăng like</h3>
            <?php View( $manageAction ); ?>
            <br>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-text-center uk-text-nowrap">Tên dịch vụ</th>
                        <th class="uk-text-center uk-text-nowrap">Số like</th>
                        <th class="uk-text-center uk-text-nowrap">VNĐ/Tháng</th>
                        <th class="uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-like-not-js">
                        <?php foreach ($listLike as $value): ?>
                        <tr class="atl-like-item-<?php echo $value['id'] ?> uk-text-center">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td><?php echo $value['service_name']; ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'like_number' ); ?></td>
                            <td><?php echo $helpPrice->formatPrice( $value['service_price'] ); ?></td>
                            <td>
                                <a href="<?php echo url('/user-tool/edit-like/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-like-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-like-js"></tbody>
                </table>
            </div>
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
                    'link' => url('/user-tool/add-like'),
                    'title' => 'gói tăng like'
                ]
            );
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-add-like' => assets('frontend/js/page-add-like.min.js')
    ) );
