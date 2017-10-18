<div id="atl-booking-deposit-wrap" class="md-card-content">
    <h3 class="heading_a">Deposit Infomation</h3>
    <div class="uk-grid" data-uk-grid-margin>

        <!-- deposit -->
        <div class="uk-width-medium-1-1">  
            <div class="uk-nestable-panel">
                <h3>Deposit</h3>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Amount</th>
                            <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Date</th>
                            <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Note</th>
                            <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Status</th>
                            <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="atl-list-js">
                        <?php if (!empty($deposit)): ?>
                            <?php foreach ($deposit as $id => $items): ?>
                                <tr>
                                    <td class="uk-text-middle uk-text-center">
                                        <div class="uk-input-group">
                                            <?php 
                                                echo $self->renderInput( 
                                                    array( 
                                                        'name'  => 'atl_booking[deposit]['.$id.'][amount]', 
                                                        'type'  => 'text', 
                                                        'class' => 'md-input masked_input label-fixed',
                                                        'attr' => [
                                                            'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                            'data-inputmask-showmaskonhover' => 'false'
                                                        ],
                                                        'value' => isset($items['amount']) ? $items['amount'] : '',
                                                    ) 
                                                ); 
                                            ?>
                                        </div>
                                    </td>
                                    <td class="uk-text-middle uk-text-center">
                                        <div class="uk-input-group">
                                            <input class="md-input label-fixed" name="<?php echo 'atl_booking[deposit]['.$id.'][date]' ?>" value="<?php echo isset($items['date']) ? $items['date'] : ''; ?>" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}" >
                                            <span class="uk-input-group-addon">
                                                <i class="uk-input-group-icon uk-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="uk-text-middle uk-text-center">
                                        <input type="text" name="<?php echo 'atl_booking[deposit]['.$id.'][note]' ?>" value="<?php echo isset($items['note']) ? $items['note'] : ''; ?>"  class="md-input"/>
                                    </td>
                                    <td class="uk-text-middle uk-text-center">
                                        <div class="atl-select">
                                            <select class="atl_bk_sv_car" name="<?php echo 'atl_booking[deposit]['.$id.'][status]' ?>" data-md-selectize>
                                                <option value="">Choose Status</option>
                                                <option <?php echo isset( $items['status'] ) ? selected( $items['status'], 'done' ) : ''; ?> value="done">Done</option>
                                                <option <?php echo isset( $items['status'] ) ? selected( $items['status'], 'Waiting' ) : ''; ?> value="Waiting">Waiting</option>
                                            </select>
                                        </div>
                                    </td>
                                    
                                    <td class="uk-text-right uk-text-middle">
                                        <a class="atl-deposit-remove-row" href="#">
                                            <i class="material-icons md-24">&#xE872;</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                    <tfoot>
                        <td colspan="4">
                            <a class="atl-deposit-add-row" href="#">
                                <i class="material-icons md-24">&#xE145;</i>
                            </a>
                        </td>
                    </tfoot>

                </table> 
            </div>      
        </div>
        <!-- End deposit -->

    </div>
</div>