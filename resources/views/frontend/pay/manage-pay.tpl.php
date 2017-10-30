<div id="avt-page-handle-pay">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Quản lý thông tin thanh toán</h3>
            <?php View('frontend/pay/layout/managePayFilter.tpl', [ 'mdPay' => $mdPay ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-text-center uk-text-nowrap">Tên ngân hàng</th>
                        <th class="uk-text-center uk-text-nowrap">Tên chủ tài khoản</th>
                        <th class="uk-text-center uk-text-nowrap">Số tài khoản</th>
                        <th class="uk-text-center uk-text-nowrap">Ngân hàng / Chi nhánh</th>
                        <th class="uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-pay-not-js">
                        <?php foreach ($listPay as $value): ?>
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
                    </tbody>
                    <tbody class="atl-list-pay-js"></tbody>
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
                    'link' => url('/user-tool/add-pay'),
                    'title' => 'pay'
                ]
            );
        ?>
    </div>  
</div>
<?php 
    registerScrips( [ 'page-pay' => assets('frontend/js/page-pay.min.js') ] );
