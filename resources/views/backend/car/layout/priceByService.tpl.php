<div class="md-card">
    <div class="md-card-toolbar">
        <h3 class="md-card-toolbar-heading-text">
            Prince by service
        </h3>
    </div>
    <div class="md-card-content large-padding">
        <div class="uk-overflow-container">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th class="uk-width-6-10">Title</th>
                        <th class="uk-width-3-10 uk-text-center uk-text-nowrap">Price (USD)</th>
                        <th class="uk-width-1-10 uk-text-right uk-text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody class="atl-car-table-price-sv">
                <?php if (!empty($carPriceSv)) {
                        foreach ($carPriceSv as $key => $item) {
                        ?>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_price_sv['.$key.'][title]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input',
                                                'value' => isset( $item['title'] ) ? $item['title'] : '',
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_price_sv['.$key.'][price]', 
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
                                    <a href="#" class="atl-car-price-sv-delete">
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
                        <a class="atl-car-price-sv-add">
                            <i class="material-icons md-24"></i>
                        </a>
                    </td></tr>
                </tfoot>
            </table>
        </div>   
    </div>
</div>