<?php 
        foreach ($svData as $key => $value) {
            $keyId = $nameId. '[service][car]['.$key.']';
        ?>
            <tr>
                <td class="uk-text-middle">Car</td>
                <td class="uk-text-middle">
                    <?php
                        $infoCar = $mdCar->getinfoCar($value['carId']);
                        echo $self->renderInput( 
                            array(
                                'type'  => 'text', 
                                'class' => 'atl-del-border',
                                'value' => isset($infoCar['service_title']) ? $infoCar['service_title'] : '',
                                'attr' => [
                                            'readonly' => ''
                                        ]
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[carId]', 
                                'type'  => 'hidden',
                                'value' => isset($value['carId']) ? $value['carId'] : ''
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[driver]', 
                                'type'  => 'hidden',
                                'value' => isset($value['driver']) ? $value['driver'] : ''
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[price_by]', 
                                'type'  => 'hidden',
                                'value' => isset($value['price_by']) ? $value['price_by'] : ''
                            )
                        ); 
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[number_km]', 
                                'type'  => 'hidden',
                                'value' => isset($value['number_km']) ? $value['number_km'] : ''
                            )
                        );
                    ?>
                </td>
                <?php if (!empty($value['number_km'])): ?>
                    <td class="uk-text-middle"><?php echo $value['number_km'] ?></td>
                <?php else: ?>
                    <td class="uk-text-middle">1</td>
                <?php endif ?>
                <td class="uk-text-middle">
                    <input type="text" name="<?php echo $keyId; ?>[price]" value="<?php echo isset($value['price']) ? $value['price'] : ''; ?>" <?php echo isset($readonly) ? $readonly : ''; ?> class="masked_input uk-text-center <?php echo isset($atlDelBorder) ? $atlDelBorder : ''; ?>" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                    <?php 
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[priceCon]', 
                                'type'  => 'hidden',
                                'value' => isset($value['price']) ? $value['price'] : ''
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[priceMain]', 
                                'type'  => 'hidden',
                                'value' => isset($value['priceMain']) ? $value['priceMain'] : $value['price']
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[targets]', 
                                'type'  => 'hidden',
                                'value' => isset($value['targets']) ? $value['targets'] : ''
                            )
                        );
                        echo $self->renderInput( 
                            array( 
                                'name'  => $keyId.'[operator]', 
                                'type'  => 'hidden',
                                'value' => isset($value['operator']) ? $value['operator'] : ''
                            )
                        );
                    ?>
                </td>
            </tr>
        <?php
        }
?>
