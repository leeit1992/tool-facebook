<?php 
    foreach ($svData as $key => $value) {
        $keyId = $nameId. '[service][ticket]['.$key.']';
    ?>
        <tr>
            <td class="uk-text-middle">Ticket</td>
            <td class="uk-text-middle">
                <?php 
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[fromTo]', 
                            'type'  => 'text', 
                            'class' => 'atl-del-border',
                            'value' => isset($value['fromTo']) ? $value['fromTo'] : '',
                            'attr' => [
                                        'readonly' => ''
                                    ]
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[code]',
                            'type'  => 'hidden',
                            'value' => isset($value['code']) ? $value['code'] : '',
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[date]',
                            'type'  => 'hidden',
                            'value' => isset($value['date']) ? $value['date'] : ''
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[class]',
                            'type'  => 'hidden',
                            'value' => isset($value['class']) ? $value['class'] : '',
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[startTime]',
                            'type'  => 'hidden',
                            'value' => isset($value['startTime']) ? $value['startTime'] : ''
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[endTime]',
                            'type'  => 'hidden',
                            'value' => isset($value['endTime']) ? $value['endTime'] : '',
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[reservationCode]',
                            'type'  => 'hidden',
                            'value' => isset($value['reservationCode']) ? $value['reservationCode'] : ''
                        )
                    ); 
                ?>
            </td>
            <td class="uk-text-middle">1</td>
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
