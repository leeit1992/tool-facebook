<?php 
    foreach ($svData as $key => $value) {
        $keyId = $nameId. '[service][acc]['.$key.']';
    ?>
        <tr>
            <td class="uk-text-middle">Accommodation</td>
            <td class="uk-text-middle">
                <?php 
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[location]', 
                            'type'  => 'hidden',
                            'value' => isset($value['location']) ? $value['location'] : ''
                        )
                    ); 
                    $infoAcc = $mdAccomodation->getAccomodationBy('id', $value['accId']);
                    echo $self->renderInput( 
                        array(
                            'name'  => $keyId.'[accName]',
                            'type'  => 'text', 
                            'class' => 'atl-del-border',
                            'value' => isset($infoAcc[0]['service_title']) ? $infoAcc[0]['service_title'] : '',
                            'attr' => [
                                        'readonly' => ''
                                    ]
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[accId]', 
                            'type'  => 'hidden', 
                            'value' => isset($value['accId']) ? $value['accId'] : ''
                        )
                    );
                    $infoRoom = $mdAccomodation->getAccomodationBy('id', $value['roomType']);
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[roomTypeName]', 
                            'type'  => 'hidden', 
                            'value' => isset($infoRoom[0]['service_title']) ? $infoRoom[0]['service_title'] :'',
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[roomType]', 
                            'type'  => 'hidden', 
                            'value' => isset($value['roomType']) ? $value['roomType'] : ''
                        )
                    );
                    echo $self->renderInput(
                        array(
                            'name'  => $keyId.'[start]',
                            'type'  => 'hidden',
                            'value' => isset($value['start']) ? $value['start'] : ''
                        )
                    );
                    echo $self->renderInput(
                        array(
                            'name'  => $keyId.'[end]',
                            'type'  => 'hidden',
                            'value' => isset($value['end']) ? $value['end'] : ''
                        )
                    );
                ?>
            </td>
            <td class="uk-text-middle">
                <?php
                    echo $self->renderInput(
                        array(
                            'name'  => $keyId.'[quantity]',
                            'type'  => 'text', 
                            'class' => 'atl-del-border',
                            'value' => isset($value['quantity']) ? $value['quantity'] : '',
                            'attr' => [
                                        'readonly' => ''
                                    ]
                        )
                    );
                ?>
            </td>
            <td class="uk-text-middle">
                <input type="text" name="<?php echo $keyId; ?>[price]" value="<?php echo isset($value['price']) ? $value['price'] : ''; ?>" <?php echo isset($readonly) ? $readonly : ''; ?> class="masked_input uk-text-center <?php echo isset($atlDelBorder) ? $atlDelBorder : ''; ?>" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false"/>
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
