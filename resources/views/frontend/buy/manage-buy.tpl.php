<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <h3 class="heading_a uk-margin-bottom">Danh sách dịch vụ đã mua</h3>
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-hover">
                <thead>
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">#</th>
                        <th class="uk-text-center uk-text-nowrap">Facebook ID</th>
                        <th class="uk-text-center uk-text-nowrap">Họ tên</th>
                        <th class="uk-text-center uk-text-nowrap">Gói dịch vụ</th>
                        <th class="uk-text-center uk-text-nowrap">Ngày đăng kí</th>
                        <th class="uk-text-center uk-text-nowrap">Thời hạn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($listBuy as $value): ?>
                    <tr class="uk-text-center">
                        <td><?php echo $i; ?></td>
                        <td>
                            <?php echo $value['buy_fb']; ?>
                        </td>
                        <td>
                            <?php echo $value['buy_name']; ?>
                        </td>
                        <td>
                            <?php 
                                $packetS = $mdService->getBy( 'id', $value['buy_packet'] );
                                echo $packetS[0]['service_name'];
                            ?>
                        </td>
                         <td>
                            <?php echo date('d-m-Y', strtotime( $value['buy_created'] )); ?>
                        </td>
                        <td>
                            <?php echo $value['buy_date']; ?> tháng
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
    </div>
</div>  
