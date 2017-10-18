<div id="atl-page-handle-car">
    <form action="<?php echo url('/atl-admin/validate-car') ?>" method="post" id="atl-form-car" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_content">
                            <h2 class="heading_b">
                                <span class="uk-text-truncate"><?php echo $actionName; ?> Car</span>
                            </h2>
                        </div>
                        <button type="submit" class="md-fab md-fab-small md-fab-success">
                            <i class="material-icons">save</i>
                        </button>
                        <?php 
                            if( !empty( $car ) ) {
                                echo $self->renderInput( 
                                    array(
                                        'name' => 'atl_car_id', 
                                        'type' => 'hidden', 
                                        'value' => $car['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/atl-admin/add-car'),
                                        'title' => 'car'
                                    ]
                                );
                            }
                        ?>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <label>Car Name</label>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_name', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $car['service_name'] ) ? $car['service_name'] : ''
                                            )
                                        ); 
                                    ?>
                                </div>
                                <div class="uk-form-row">
                                    <label>
                                        Number plate
                                    </label>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_number_plate', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $car['car_number_plate'] ) ? $car['car_number_plate'] : ''
                                            )
                                        ); 
                                    ?>
                                </div>
                                <div class="uk-form-row">
                                    <label>
                                        Seats
                                    </label>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_car_seats', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $car['car_seats'] ) ? $car['car_seats'] : ''
                                            )
                                        ); 
                                    ?>
                                </div>
                            </div>
                            <div class="uk-width-large-1-2">
                                <div class="uk-form-row">
                                    <label>Description</label>
                                    <textarea class="md-input" name="atl_car_description"  cols="30" rows="4"><?php echo isset( $car['service_description'] ) ? $car['service_description'] : '' ?></textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label>Choose Owner</label>
                                    <select name="atl_car_owner" data-md-selectize>
                                        <option value="">Select...</option>
                                        <?php foreach ($partners as $partner) {
                                            $selected = isset( $car['car_owner'] ) ? selected( $car['car_owner'], $partner['id'] ) : '';
                                            ?>
                                            <option <?php echo $selected ?> value="<?php echo $partner['id'] ?>"> <?php echo $partner['partner_name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    View('backend/car/layout/priceByKm.tpl', [ 'carPriceKm' => $carPriceKm, 'self' => $self ]);
                    View('backend/car/layout/priceByService.tpl', [ 'carPriceSv' => $carPriceSv, 'self' => $self ]);
                ?>
            </div>
            <?php
                View('backend/car/layout/sidebarRight.tpl', [ 'car' => $car, 'gallery' => $gallery, 'self' => $self ]);
            ?>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>

<?php 
    registerScrips( array(
        'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
        'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
        'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
        'page-admin-car' => assets('backend/js/page-admin-car.min.js')
    ) );
?>
