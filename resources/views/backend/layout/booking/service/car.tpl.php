<?php 
    foreach ($svData as $key => $value) {
        //get User Name of operator edit price
        $user = isset($value['operator']) ? $mdUser->getUserBy('id', $value['operator']) : [];
        $operatorName = isset($user[0]['user_name']) ? $user[0]['user_name'] : '';
        // get price before
        $priceEdit = $helpPrice->formatPrice($value['priceMain']);
        //set string name Tooltips
        $titleTooltips = 'title="'. $operatorName .' - ' .$priceEdit.'" data-uk-tooltip="{pos:\'top\'}"';
    ?>
        <tr <?php echo ($value['price'] != $value['priceMain']) ? $titleTooltips : ''; ?>>
            <td class="uk-text-middle">Car</td>
            <td class="uk-text-middle">
                <?php
                    $infoCar = $mdCar->getinfoCar($value['carId']);
                    echo isset($infoCar['service_title']) ? $infoCar['service_title'] : '';
                ?>
            </td>
            <?php if (!empty($value['number_km'])): ?>
                <td class="uk-text-middle"><?php echo $value['number_km'] ?></td>
            <?php else: ?>
                <td class="uk-text-middle">1</td>
            <?php endif ?>
            <td class="uk-text-middle">
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
                <input type="hidden" class="atl-priceMain" value="<?php echo isset($priceEdit) ? $priceEdit : ''; ?>">
            </td>
            <td class="uk-text-middle uk-text-nowrap uk-text-center">
                <?php if (isset($value['priceMain'])): ?>
                    <?php if ($value['price'] != $value['priceMain']): ?>
                        <a href="#" class="atl-action-price-booking" title="Accept" data-idInti="<?php echo isset($idInti) ? $idInti : ''; ?>" data-idBooking="<?php echo isset($idBooking) ? $idBooking : ''; ?>" data-serv="car" data-idkey="<?php echo $key; ?>" data-act="accept"><i class="material-icons md-24 uk-text-success">check</i></a>&nbsp &nbsp
                        <a href="#" class="atl-action-price-booking" title="Refuse" data-idInti="<?php echo isset($idInti) ? $idInti : ''; ?>" data-idBooking="<?php echo isset($idBooking) ? $idBooking : ''; ?>" data-serv="car" data-idkey="<?php echo $key; ?>" data-act="refuse"><i class="material-icons md-24 uk-text-danger">cancel</i></a>
                    <?php endif ?>
                <?php endif ?>
            </td>
        </tr>
    <?php
    }
?>
