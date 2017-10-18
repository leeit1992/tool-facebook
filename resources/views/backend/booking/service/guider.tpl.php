<!-- Service other -->
<div  class="uk-width-medium-1-1 atl-service-guider-wrap">  
    <div class="uk-nestable-panel">
        <?php if( $title ): ?>
        <h3>Guider</h3>
        <?php endif ?>
        <table class="uk-table">
            <thead>
                <tr>
                    <th class="uk-width-3-10 uk-text-center uk-text-nowrap">Location</th>
                    <th class="uk-width-3-10 uk-text-nowrap">Date</th>
                    <th class="uk-width-3-10 uk-text-center uk-text-nowrap">Name Guider</th>
                    <th class="uk-width-3-10 uk-text-center uk-text-nowrap">Price</th>
                    <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody class="atl-list-js">
            <?php if(!empty( $svData )): ?>
                <?php foreach ($svData as $key => $items): ?>
                    <?php
                       $nameId = 'atl_booking[tour][intinerary]['.$wrapId.'][service][guider]['.$key.']';
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
                        <td class="uk-text-middle uk-text-center">
                            <div class="atl-select">
                                
                                <select class="atl-selectize atl-sv-guider-id" name="<?php echo $nameId .'[guider]' ?>">
                                    <option value="">Choose Guider</option>
                                    <?php if (is_array($dataGuider) || is_object($dataGuider)): ?>
                                        <?php foreach ($dataGuider as $value) {
                                            $selected = ($value['id'] == $items['guider']) ? 'selected' : '';
                                            echo '<option '.$selected.' value="'.$value['id'].'">'.$value['service_title'].'</option>';
                                        } ?>
                                    <?php endif ?>
                                    
                                </select>
                            </div>
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
                                <input type="hidden" name="<?php echo $nameId . '[targets]';?>" value="<?php echo isset($items['targets']) ? $items['targets'] : '' ?>">
                                <input type="hidden" id="atl-pay-<?php echo $key ?>"  name="<?php echo $nameId . '[payStatus]';?>" value="<?php echo isset($items['payStatus']) ? $items['payStatus'] : 0 ?>">
                                <input type="hidden" name="<?php echo $nameId . '[priceMain]';?>" value="<?php echo isset($items['priceMain']) ? $items['priceMain'] : '' ?>">
                                <input type="hidden" name="<?php echo $nameId . '[operator]';?>" value="<?php echo isset($items['operator']) ? $items['operator'] : '' ?>">
                            </div>
                        </td>
                        <td class="uk-text-right uk-text-middle">
                            <a class="atl-service-guider-remove-row" href="#"><i class="material-icons md-24">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            </tbody>
            <tfoot>
                <tr><td colspan="5">
                    <a class="atl-service-guider-add-row" href="#">
                        <i class="material-icons md-24">&#xE145;</i>
                    </a>
                </td>
            </tr></tfoot>
        </table> 
    </div>      
</div>
<!-- End Service other -->