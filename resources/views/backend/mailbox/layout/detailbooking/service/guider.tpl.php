<?php 
    foreach ($svData as $key => $value) {
        $keyId = $nameId. '[service][guider]['.$key.']';
    ?>
        <tr>
            <td class="uk-text-middle">Guider</td>
            <td class="uk-text-middle">
                <?php 
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[location]', 
                            'type'  => 'hidden', 
                            'value' => isset($value['location']) ? $value['location'] : ''
                        )
                    );
                    $infoGuider = $mdGuider->getGuiderBy('id', $value['guider']);
                    echo $self->renderInput( 
                        array(
                            'type'  => 'text', 
                            'class' => 'atl-del-border',
                            'value' => isset($infoGuider[0]['service_title']) ? $infoGuider[0]['service_title'] : '',
                            'attr' => [
                                        'readonly' => ''
                                    ]
                        )
                    );
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[guider]', 
                            'type'  => 'hidden', 
                            'value' => isset($value['guider']) ? $value['guider'] : ''
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
