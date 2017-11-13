<div id="avt-page-handle-service">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Quản lý gói combo auto</h3>

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
                        <th class="uk-text-center uk-text-nowrap">Số comment</th>
                        <th class="uk-text-center uk-text-nowrap">POST/Ngày</th>
                        <th class="uk-text-center uk-text-nowrap">Giá tiền</th>
                        <th class="uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-packet-service-not-js">
                        <?php foreach ($listPacketService as $value): ?>
                        <tr class="atl-packet-service-item-<?php echo $value['id'] ?> uk-text-center">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td><?php echo $value['service_name']; ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'service_like' ); ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'service_comment' ); ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'post_limit' ); ?></td>
                            <td><?php echo $helpPrice->formatPrice( $value['service_price'] ); ?></td>
                            <td>
                                <a href="<?php echo url('/user-tool/edit-packet-service/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-packet-service-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-packet-service-js"></tbody>
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
                    'link' => url('/user-tool/add-packet-service'),
                    'title' => 'packet service'
                ]
            );
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-service' => assets('frontend/js/page-service.min.js')
    ) );
