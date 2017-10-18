<?php 
if( !isset( $wrapId ) ){
    $wrapId = uniqid();
}
?>
<div id="atl-service-hotel-wrap-<?php echo $wrapId ?>" class="uk-width-medium-1-1 atl-service-hotel-wrap">  
    <div class="uk-nestable-panel">
        <?php if( $title ): ?>
        <h3>Accomodation</h3>
        <?php endif ?>
        <table class="uk-table">
            <thead>
                <tr>
                    <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Location</th>
                    <th class="uk-width-2-10 uk-text-nowrap">Name</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Room Type</th>
                    <th class="uk-width-1-10 uk-text-left uk-text-nowrap">C-IN</th>
                    <th class="uk-width-1-10 uk-text-left uk-text-nowrap">C-OUT</th>
                    <th class="uk-width-1-10 uk-text-left uk-text-nowrap">Night</th>
                    <th class="uk-width-1-10 uk-text-left uk-text-nowrap">Quantity</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Price</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="atl-sv-list-choose">
            <?php if( !empty($svData) ): ?>
                <?php foreach ($svData as $key => $items): ?>
                    <?php 
                        $nameId = $nameKey. '['.$wrapId.'][service][acc]['.$key.']';

                        if( isset( $nameType ) && 'single' == $nameType ) {
                            $nameId = $nameKey. '[acc]['.$key.']';
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
                            <input type="text" class="md-input" name="<?php echo $nameId; ?>[accName]" value="<?php echo isset($items['accName']) ? $items['accName'] : ''; ?>">
                            <input type="hidden" name="<?php echo $nameId; ?>[accId]" value="<?php echo isset($items['accId']) ? $items['accId'] : ''; ?>">
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input" name="<?php echo $nameId; ?>[roomTypeName]" value="<?php echo isset($items['roomTypeName']) ? $items['roomTypeName'] : ''; ?>">
                            <input type="hidden" name="<?php echo $nameId; ?>[roomType]" value="<?php echo isset($items['roomType']) ? $items['roomType'] : ''; ?>">
                        </td>


                        <td class="uk-text-middle uk-text-center">
                            <input type="text" name="<?php echo $nameId; ?>[start]" class="md-input atl-intinerary--item-sv-acc-cin atl-datepicker" value="<?php echo isset($items['start']) ? $items['start'] : ''; ?>"/>
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" name="<?php echo $nameId; ?>[end]" class="md-input atl-intinerary--item-sv-acc-cout atl-datepicker" value="<?php echo isset($items['end']) ? $items['end'] : ''; ?>"/>
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" name="<?php echo $nameId; ?>[nightNumber]" class="md-input" readonly value="<?php echo isset($items['nightNumber']) ? $items['nightNumber'] : ''; ?>">
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <input type="text" class="md-input atl-intinerary--item-sv-acc-quantity" name="<?php echo $nameId; ?>[quantity]" value="<?php echo isset($items['quantity']) ? $items['quantity'] : ''; ?>">
                        </td>
                        <td class="uk-text-middle uk-text-center">
                            <div class="uk-input-group">
                                <?php 
                                    echo $self->renderInput( 
                                        array( 
                                            'name'  => $nameId . '[totalPrice]', 
                                            'type'  => 'text', 
                                            'class' => 'masked_input md-input label-fixed atl-intinerary--item-sv-acc-price',
                                            'value' => isset($items['totalPrice']) ? $items['totalPrice'] : '',
                                            'attr' => [
                                                'data-price' => isset($items['price']) ? $items['price'] : '',
                                                'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                        ) 
                                    ); 
                                ?>
                                <input type="hidden" name="<?php echo $nameId; ?>[price]" value="<?php echo isset($items['price']) ? $items['price'] : ''; ?>">
                            </div>
                            <input type="hidden" id="atl-pay-<?php echo $key ?>"  name="<?php echo $nameId . '[payStatus]';?>" value="<?php echo isset($items['payStatus']) ? $items['payStatus'] : 0 ?>">
                            <input type="hidden" name="<?php echo $nameId . '[targets]';?>" value="<?php echo isset($items['targets']) ? $items['targets'] : '' ?>">
                            <input type="hidden" name="<?php echo $nameId . '[priceMain]';?>" value="<?php echo isset($items['priceMain']) ? $items['priceMain'] : '' ?>">
                            <input type="hidden" name="<?php echo $nameId . '[operator]';?>" value="<?php echo isset($items['operator']) ? $items['operator'] : '' ?>">
                        </td>
                        <td class="uk-text-right uk-text-middle">
                            <a class="atl-service-acc-remove-row" href="#"><i class="material-icons md-24">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        <a href="#" id="atl-find-acc-open" data-wrap-target="#atl-service-hotel-wrap-<?php echo $wrapId ?>" data-uk-modal="{target:'#atl_find_accomodation'}">
                            <i class="material-icons md-24">&#xE145;</i>
                        </a> 
                    </td>
                </tr>
            </tfoot>
        </table> 
    </div>      
</div>
<!-- End Service Accomodation -->