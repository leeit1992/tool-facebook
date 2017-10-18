<?php 
    foreach ($svData as $key => $value) {
        $keyId = $nameId. '[service][other]['.$key.']';
    ?>
        <tr>
            <td class="uk-text-middle">
                <?php 
                    echo $self->renderInput( 
                        array( 
                            'name'  => $keyId.'[targets]', 
                            'type'  => 'text', 
                            'class' => 'masked_input uk-text-center',
                            'value' => isset($value['targets']) ? $value['targets'] : '',
                            'attr' => [
                                        'data-inputmask' =>"'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                        'data-inputmask-showmaskonhover' => "false"
                                    ]
                        )
                    ); 
                ?>
            </td>
        </tr>
    <?php
    }
?>
