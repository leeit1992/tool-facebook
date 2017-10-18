<div class="md-card">
    <div class="md-card-toolbar">
        <h3 class="md-card-toolbar-heading-text">
            Prince by km
        </h3>
    </div>
    <div class="md-card-content large-padding">
        <div class="uk-overflow-container">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th class="uk-width-3-10 uk-text-center">Start</th>
                        <th class="uk-width-3-10 uk-text-center uk-text-nowrap">End</th>
                        <th class="uk-width-3-10 uk-text-center uk-text-nowrap">Price (USD)</th>
                        <th class="uk-width-1-10 uk-text-right uk-text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody class="atl-car-table-price-km">
                <?php if (!empty($carPriceKm)) {
                        foreach ($carPriceKm as $key => $item) {
                        ?>
                            <tr >
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_price_km['.$key.'][start]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input uk-text-center',
                                                'value' => isset( $item['start'] ) ? $item['start'] : ''
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_price_km['.$key.'][end]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input uk-text-center',
                                                'value' => isset( $item['end'] ) ? $item['end'] : ''
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_price_km['.$key.'][price]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input masked_input uk-text-center',
                                                'value' => isset( $item['price'] ) ? $item['price'] : '',
                                                'attr' => [
                                                    'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                    'data-inputmask-showmaskonhover' => 'false'
                                                ]
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td class="uk-text-right uk-text-middle">
                                    <a href="#" class="atl-car-price-km-delete">
                                        <i class="material-icons md-24">delete</i>
                                    </a>
                                </td>
                            </tr>
                        <?php 
                         }
                    } ?>
                </tbody>
                <tfoot>
                    <tr><td colspan="4">
                        <a class="atl-car-price-km-add">
                            <i class="material-icons md-24"></i>
                        </a>
                    </td></tr>
                </tfoot>
            </table>
        </div>   
    </div>
</div>