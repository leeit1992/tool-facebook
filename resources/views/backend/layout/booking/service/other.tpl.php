<?php 
    foreach ($svData as $key => $value) {
        //get User Name of operator edit price
        $user = isset($value['operator']) ? $mdUser->getUserBy('id', $value['operator']) : [];
        $operatorName = isset($user[0]['user_name']) ? $user[0]['user_name'] : '';
        $priceEdit = $helpPrice->formatPrice($value['priceMain']);
        //set string name Tooltips
        $titleTooltips = '';
        if (isset($value['priceMain'])) {
            $titleTooltips = ($value['price'] != $value['priceMain']) ? 'title="'. $operatorName .' - ' .$priceEdit.'" data-uk-tooltip="{pos:\'top\'}"' : '';
        }
    ?>
        <tr <?php echo $titleTooltips; ?>>
            <td class="uk-text-middle">Service Other</td>
            <td class="uk-text-middle">
                <?php 
                    $infoOther = $mdOtherService->getinfoOtherService($value['svId']);
                    echo isset($infoOther['service_title']) ? $infoOther['service_title'] : '';
                ?>
            </td>
            <td class="uk-text-middle">
                <?php
                    echo $self->renderInput( 
                        array(
                            'type'  => 'text', 
                            'class' => 'atl-del-border',
                            'value' => isset($value['quantity']) ? $value['quantity'] : '',
                            'attr' => [
                                        'readonly' => ''
                                    ]
                        )
                    ); 
                ?>
                <input type="hidden" class="atl-priceMain" value="<?php echo isset($priceEdit) ? $priceEdit : ''; ?>">
            </td>
            <td>
                <?php 
                    echo $self->renderInput( 
                        array(
                            'type'  => 'text', 
                            'class' => 'masked_input atl-del-border uk-text-center atl-price-main',
                            'value' => isset($value['price']) ? $value['price'] : '',
                            'attr' => [
                                        'data-inputmask' =>"'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                        'data-inputmask-showmaskonhover' => "false",
                                        'readonly' => ''
                                    ]
                        )
                    );
                ?>
            </td>
            <td class="uk-text-middle uk-text-nowrap uk-text-center">
                <?php if (isset($value['priceMain'])): ?>
                    <?php if ($value['price'] != $value['priceMain']): ?>
                        <a href="#" class="atl-action-price-booking" title="Accept" data-idInti="<?php echo isset($idInti) ? $idInti : ''; ?>" data-idBooking="<?php echo isset($idBooking) ? $idBooking : ''; ?>" data-serv="other" data-idkey="<?php echo $key; ?>" data-act="accept"><i class="material-icons md-24 uk-text-success">check</i></a>&nbsp &nbsp
                        <a href="#" class="atl-action-price-booking" title="Refuse" data-idInti="<?php echo isset($idInti) ? $idInti : ''; ?>" data-idBooking="<?php echo isset($idBooking) ? $idBooking : ''; ?>" data-serv="other" data-idkey="<?php echo $key; ?>" data-act="refuse"><i class="material-icons md-24 uk-text-danger">cancel</i></a>
                    <?php endif ?>
                <?php endif ?>
            </td>
        </tr>
    <?php
    }
?>
