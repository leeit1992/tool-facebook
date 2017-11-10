<div id="avt-page-packet-comment">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Quản lý gói auto comment</h3>
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
                        <th class="uk-text-center uk-text-nowrap">Comment/Ngày</th>
                        <th class="uk-text-center uk-text-nowrap">POST/Ngày</th>
                        <th class="uk-text-center uk-text-nowrap">VNĐ/Tháng</th>
                        <th class="uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-packet-comment-not-js">
                        <?php foreach ($listPacketComment as $value): ?>
                        <tr class="atl-packet-comment-item-<?php echo $value['id'] ?> uk-text-center">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td><?php echo $value['service_name']; ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'comment_number' ); ?></td>
                            <td><?php echo $mdService->getMetaData( $value['id'], 'post_limit' ); ?></td>
                            <td><?php echo $helpPrice->formatPrice( $value['service_price'] ); ?></td>
                            <td>
                                <a href="<?php echo url('/user-tool/edit-packet-comment/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-packet-comment-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-packet-comment-js"></tbody>
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
                    'link' => url('/user-tool/add-packet-comment'),
                    'title' => 'packet comment'
                ]
            );
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-packet-comment' => assets('frontend/js/page-packet-comment.min.js')
    ) );
