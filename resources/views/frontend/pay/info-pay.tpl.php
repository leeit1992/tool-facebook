<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-1-1">
        <div class="md-card">
            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                <h2 class="heading_b" style="color: white;">
                    <i class="md-icon material-icons" style="color: white;">account_balance</i> Chuyển khoản ngân hàng và ví điện tử
                </h2>
            </div>
            <div class="user_content" data-uk-grid-margin>
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-1-1">
                        <div class="uk-overflow-container">
                            <table class="uk-table">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-5 uk-text-center">Ngân hàng & Ví điện tử</th>
                                        <th>Thông tin thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($listPay as $value): ?>
                                    <tr>
                                        <td class="uk-text-middle uk-text-center uk-text-bold" style="color: green"><?php echo $value['bank_name'] ?></td>
                                        <td>
                                            <span class="uk-text-bold">Tài Khoản: </span>
                                            <span class="uk-text-bold" style="color: red"><?php echo $value['bank_number'] ?></span>
                                            <br>
                                            <span class="uk-text-bold">Tên: </span>
                                            <span class="uk-text-bold" style="color: red"><?php echo $value['bank_user_name'] ?></span>
                                            <br>
                                            <span class="uk-text-bold">Chi nhánh: </span>
                                            <span class="uk-text-bold" style="color: red"><?php echo $value['bank_address'] ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
