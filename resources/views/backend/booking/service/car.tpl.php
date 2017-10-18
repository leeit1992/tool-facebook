<!-- Service Car -->
<div class="uk-width-medium-1-1 atl-service-car-wrap">  
    <div class="uk-nestable-panel">
        <?php if( $title ): ?>
        <h3>Cars</h3>
        <?php endif ?>
        <table class="uk-table">
            <thead>
                <tr>
                    <th class="uk-width-2-10 uk-text-nowrap">Location</th>
                    <th class="uk-width-2-10 uk-text-nowrap">Date</th>
                    <th class="uk-width-2-10 uk-text-nowrap">Choose Car</th>
                    <th class="uk-width-2-10 uk-text-nowrap atl-sv-car-price-by">Price by</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap atl-sv-car-km">Km</th>
                    <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                    <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="atl-list-js">
            <?php if(!empty( $svData )): ?>
                <?php foreach ($svData as $key => $items): ?>
                    <?php
                        $nameId = $nameKey. '['.$wrapId.'][service][car]['.$key.']';
                        if( isset( $nameType ) && 'single' == $nameType ) {
                            $nameId = $nameKey. '[car]['.$key.']';
                        }     
                    ?>
                    <tr>
                        <td>
                            <div class="md-input-wrapper md-input-filled">
                                <div class="atl-select">
                                    <select name="<?php echo $nameId.'[location]' ?>">
                                        <option value="">Location</option>
                                        <?php foreach ($locations as $location) {
                                            $selected = selected($location['id'], $items['location']);
                                            echo '<option '.$selected.' value="'.$location['id'].'">'.$location['location_name_display'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input atl-datepicker" name="<?php echo $nameId . '[date]' ?>" value="<?php echo isset($items['date']) ? $items['date'] : ''; ?>"/>
                        </td>
                        <td>
                            <div class="md-input-wrapper md-input-filled">
                                <div class="atl-select">
                                    <select class="atl_bk_sv_car" name="<?php echo $nameId.'[carId]' ?>">
                                        <option value="">Choose Car</option>
                                        <?php foreach ($getAllCar as $car) {
                                            $selected = selected($car['id'], $items['carId']);
                                            echo '<option '.$selected.' value="'.$car['id'].'">'.$car['service_title'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <!-- <td>
                            <div class="md-input-wrapper md-input-filled">
                                <div class="atl-select">
                                    <select name="<?php echo $nameId.'[driver]' ?>">
                                        <option value="">Choose Driver</option>
                                        <?php foreach ($mdDriver->getAllDriver() as $driver) {
                                            $selected = ($driver['id'] == $items['driver']) ? 'selected' : '';
                                            echo '<option '.$selected.' value="'.$driver['id'].'">'.$driver['service_title'].'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </td> -->
                        <td class="atl-sv-car-price-by">
                            <div class="md-input-wrapper md-input-filled">

                                <div class="atl-select">
                                    <textarea style="display: none;"><?php echo json_encode($apiCar->getListPriceCar($items['carId'])) ?></textarea>
                                    <select class="atl_bk_sv_car_price_by" name="<?php echo $nameId.'[price_by]' ?>">
                                        <option <?php echo selected($items['price_by'], 'bykm') ?> value="bykm">Price By Km</option>
                                        <?php 
                                            foreach ($apiCar->getListPriceCar($items['carId']) as $key =>  $value) {
                                                if( 'price_by_km' != $key ) {
                                                    $selected = selected($items['price_by'], $key);
                                                    echo '<option '.$selected .' value="'.$key.'">'.$value['title'].'</option>';
                                                }
                                            }
                                        ?>
        
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td class="atl-sv-car-km">
                            <?php
                                $attrCar = '';
                                if( 'bykm' != $items['price_by'] ) {
                                    $attrCar = 'readonly="readonly" style="background: #f5efef;"';
                                }
                            ?>
                            <input type="text" <?php echo $attrCar ?> class="md-input atl_bk_sv_car_km" name="<?php echo $nameId.'[number_km]' ?>" value="<?php echo isset($items['number_km']) ? $items['number_km'] : ''; ?>">
                            <input type="hidden" class="atl_bk_sv_car_quantity" name="<?php echo $nameId.'[quantity]' ?>" value="<?php echo isset($items['quantity']) ? $items['quantity'] : ''; ?>">
                        </td>
                        <td>
                            <div class="uk-input-group">
                                <?php 
                                    echo $self->renderInput( 
                                        array( 
                                            'name'  => $nameId . '[totalPrice]', 
                                            'type'  => 'text', 
                                            'class' => 'masked_input md-input atl_bk_sv_car_total_price',
                                            'value' => isset($items['totalPrice']) ? $items['totalPrice'] : 0,
                                            'attr' => [
                                                'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                        ) 
                                    );

                                ?>
                                <input type="hidden" class="atl_bk_sv_car_price" name="<?php echo $nameId . '[price]';?>" value="<?php echo isset($items['price']) ? $items['price'] : 0 ?>">
                                <input type="hidden" id="atl-pay-<?php echo $key ?>"  name="<?php echo $nameId . '[payStatus]';?>" value="<?php echo isset($items['payStatus']) ? $items['payStatus'] : 0 ?>">
                                <input type="hidden" name="<?php echo $nameId . '[targets]';?>" value="<?php echo isset($items['targets']) ? $items['targets'] : '' ?>">
                                <input type="hidden" name="<?php echo $nameId . '[priceMain]';?>" value="<?php echo isset($items['priceMain']) ? $items['priceMain'] : '' ?>">
                                <input type="hidden" name="<?php echo $nameId . '[operator]';?>" value="<?php echo isset($items['operator']) ? $items['operator'] : '' ?>">
                            </div>
                        </td>
                        <td class="uk-text-right uk-text-middle">
                            <a class="atl-service-car-remove-row" href="#">
                                <i class="material-icons md-24">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            </tbody>
            <tfoot>
                <td colspan="7">
                    <a class="atl-service-car-add-row" href="#">
                        <i class="material-icons md-24">&#xE145;</i>
                    </a>
                </td>
            </tfoot>
        </table> 
    </div>       
</div>
<!-- End Service Car -->