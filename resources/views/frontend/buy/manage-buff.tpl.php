<div id="avt-page-manage-buff">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Danh sách dịch vụ đã mua</h3>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                        <tr>
                            <th class="uk-text-center uk-text-nowrap">#</th>
                            <th class="uk-text-center uk-text-nowrap">Gói dịch vụ</th>
                            <th class="uk-text-center uk-text-nowrap">Ngày đăng kí</th>
                            <th class="uk-text-center uk-text-nowrap">Thời hạn</th>
                            <th class="uk-text-center uk-text-nowrap">Tình trạng</th>
                            <th class="uk-text-center uk-text-nowrap">Số lần còn lại</th>
                            <th class="uk-text-center uk-text-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                            $dateCurrent = date("Y-m-d");
                        foreach ($listBuff as $value): 
                        ?>
                        <tr class="uk-text-center">
                            <td><?php echo $i; ?></td>
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
                            <td>
                            <?php 
                                $date = $self->countDay( $value['buy_created'], date("Y-m-d H:i:s") );
                                if ( $date > $value['buy_date']*30 ) {
                                    echo '<span class="uk-text-danger uk-text-bold"> Đã hết hạn</span>';
                                } else {
                                    $subDate = $value['buy_date']*30 - $date;
                                    echo '<span class="uk-text-success uk-text-bold">Còn '. $subDate . ' ngày</span>';
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if ( $value['buy_run_day'] > 0 ) {
                                    echo '<span class="uk-text-success uk-text-bold">'.$value['buy_run_day'].'</span>';
                                } else {
                                    echo '<span class="uk-text-danger uk-text-bold">Đã hết lần sử dụng</span>';
                                }
                            ?>
                            </td>
                            <td>
                                <a href="#" class="atl-manage-buff-delete-js" data-id="<?php echo $value['id'] ?>">
                                    Remove
                                </a>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>
<?php 
    registerScrips( [ 'page-manage-buff' => assets('frontend/js/page-manage-buff.min.js') ] );
