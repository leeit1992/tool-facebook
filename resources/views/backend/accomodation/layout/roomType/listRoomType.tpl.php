<?php 
foreach ($roomType as $key => $value): 
    $listType = !empty( $value['room_type_type'] ) ? json_decode( $value['room_type_type'] ) : array();
    $priceSg = $self->mdAccomodation->getMetaData( $value['id'], 'room_type_price_sg' );
    $priceDb = $self->mdAccomodation->getMetaData( $value['id'], 'room_type_price_db' );
    $priceAll = $self->mdAccomodation->getMetaData( $value['id'], 'room_type_price_all' );
?>
<div class="atl-room-type-item atl-room-type-<?php echo $value['id'] ?>">
    <div class="uk-accordion-title">
        <h3><?php echo $value['service_title'] ?></h3>
        <div class="atl-accordion-action">
           <a class="atl-accordion-edit" data-uk-modal="{target:'#addRoomType'}" data-id="<?php echo $value['id'] ?>" href="#"><i class="md-icon material-icons">edit</i></a> 
           <a class="atl-accordion-trash" data-id="<?php echo $value['id'] ?>" href="#"><i class="md-icon material-icons">delete</i></a> 
        </div>
    </div>
    <div class="uk-accordion-content">
        <div class="uk-form-row">
            <div class="uk-grid">
                <?php if( !in_array('singleRoom', $listType) && !in_array('doubleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-1">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Price base room type</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_room_type_price_base', 
                                    'type'  => 'text', 
                                    'class' => 'md-input masked_input',
                                    'value' => $priceAll,
                                    'attr' => [
                                        'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                        'data-inputmask-showmaskonhover' => 'false'
                                    ]
                                ) 
                            ); 
                        ?>
                    </div>
                </div>
                 <?php endif; ?>
                <?php if( in_array('singleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-<?php echo !in_array('doubleRoom', $listType) ? 1 : 2; ?>">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Price base for single room</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_room_type_price_base_sg', 
                                    'type'  => 'text', 
                                    'class' => 'md-input masked_input',
                                    'value' => $priceSg,
                                    'attr' => [
                                        'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                        'data-inputmask-showmaskonhover' => 'false'
                                    ]
                                ) 
                            ); 
                        ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if( in_array('doubleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-<?php echo !in_array('singleRoom', $listType) ? 1 : 2; ?>">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Price base for double room</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_room_type_price_base_db', 
                                    'type'  => 'text', 
                                    'class' => 'md-input masked_input',
                                    'value' => $priceDb,
                                    'attr' => [
                                        'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                        'data-inputmask-showmaskonhover' => 'false'
                                    ]
                                ) 
                            ); 
                        ?>
                    </div>
                </div>
               <?php endif; ?>
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-grid">
                 <?php if( !in_array('singleRoom', $listType) && !in_array('doubleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-1">
                    <a class="atl-modal-open" data-type="all" data-id="<?php echo $value['id'] ?>" data-atl-modal="#atlRoomTypePricing">Manage Price</a>
                </div>
                <?php endif; ?>
                <?php if( in_array('singleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-<?php echo !in_array('doubleRoom', $listType) ? 1 : 2; ?>">
                    <a class="atl-modal-open" data-type="sg"  data-id="<?php echo $value['id'] ?>" data-atl-modal="#atlRoomTypePricing">Manage Price Single Room</a>
                </div>
                <?php endif; ?>
                <?php if( in_array('doubleRoom', $listType) ) : ?>
                <div class="uk-width-medium-1-<?php echo !in_array('singleRoom', $listType) ? 1 : 2; ?>">
                    <a class="atl-modal-open" data-type="db" data-id="<?php echo $value['id'] ?>" data-atl-modal="#atlRoomTypePricing">Manage Price Double Room</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>