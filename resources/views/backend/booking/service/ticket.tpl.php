<!-- Service Car -->
<div class="uk-width-medium-1-1 atl-service-tk-wrap">  
    <div class="uk-nestable-panel">
        <?php if( $title ): ?>
        <h3>FLIGHT, TRAIN TICKETS</h3>
        <?php endif ?>
        <table class="uk-table">
            <thead>
                <tr>
                    <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Location</th>
                    <th class="uk-width-1-10 uk-text-nowrap">From-to</th>
                    <th class="uk-width-1-10 uk-text-nowrap">Flight, Train</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Date</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Class</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Start</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">End</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Code</th>
                    <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="atl-list-js">
            <?php if(!empty( $svData )): ?>
                <?php foreach ($svData as $key => $items): ?>
                    <?php
                       $nameId = $nameKey. '['.$wrapId.'][service][ticket]['.$key.']';
                       if( isset( $nameType ) && 'single' == $nameType ) {
                            $nameId = $nameKey. '[ticket]['.$key.']';
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
                            <input type="text" class="md-input" name="<?php echo $nameId . '[fromTo]' ?>" value="<?php echo isset($items['fromTo']) ? $items['fromTo'] : ''; ?>">
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input" name="<?php echo $nameId . '[code]' ?>" value="<?php echo isset($items['code']) ? $items['code'] : ''; ?>">
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input atl-datepicker" name="<?php echo $nameId . '[date]' ?>" value="<?php echo isset($items['date']) ? $items['date'] : ''; ?>"/>
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input" name="<?php echo $nameId . '[class]' ?>" value="<?php echo isset($items['class']) ? $items['class'] : ''; ?>">
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <div class="uk-input-group">
                                <input class="md-input" type="text" value="<?php echo isset($items['startTime']) ? $items['startTime'] : ''; ?>" name="<?php echo $nameId . '[startTime]' ?>" data-uk-timepicker>
                            </div>
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <div class="uk-input-group">
                                <input class="md-input" type="text" value="<?php echo isset($items['endTime']) ? $items['endTime'] : ''; ?>" name="<?php echo $nameId . '[endTime]' ?>" data-uk-timepicker>
                            </div>
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input" name="<?php echo $nameId . '[reservationCode]' ?>" value="<?php echo isset($items['reservationCode']) ? $items['reservationCode'] : ''; ?>">
                        </td>

                        <td class="uk-text-middle uk-text-center">
                            <div class="uk-input-group">
                                <?php 
                                    echo $self->renderInput( 
                                        array( 
                                            'name'  => $nameId . '[price]', 
                                            'type'  => 'text', 
                                            'class' => 'masked_input md-input label-fixed',
                                            'value' => isset($items['price']) ? $items['price'] : '',
                                            'attr' => [
                                                'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                        ) 
                                    ); 
                                ?>
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
                <td colspan="10">
                    <a class="atl-service-tk-add-row" href="#">
                        <i class="material-icons md-24">&#xE145;</i>
                    </a>
                </td>
            </tfoot>
        </table> 
    </div>       
</div>
<!-- End Service Car -->
