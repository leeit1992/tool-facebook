<div class="md-card-content large-padding">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-2">
            <label>Driver name *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_driver_name', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $driver['service_name'] ) ? $driver['service_name'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-width-large-1-2">
            <div class="uk-input-group">
                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                <div class="md-input-wrapper <?php echo isset( $meta['driver_birthday'] ) ? 'md-input-filled' : '' ?>">
                    <label>Birthday</label>
                    <input class="md-input" type="text" name="atl_driver_birthday" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo isset( $meta['driver_birthday'] ) ? $meta['driver_birthday'] : '' ?>">
                    <span class="md-input-bar"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <label>More description</label>
            <textarea class="md-input" name="atl_driver_desc" cols="30" rows="3"><?php echo isset( $driver['service_description'] ) ? $driver['service_description'] : '' ?></textarea>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-large-1-2">
            <label>Choose location</label>
            <select name="atl_driver_location[]" data-md-selectize multiple>
                <option value=""> Location </option>
                <?php
                foreach ($locations as $key => $value) :
                    $selected = '';
                    if( isset( $driverLocation ) ) {
                        if( in_array( $value['id'], $driverLocation ) ) {
                            $selected = 'selected';
                        }
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $value['id'] ?>"> <?php echo $value['location_name_display'];?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
            </span>
            <label>Phone Number *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_driver_phone', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['driver_phone'] ) ? $meta['driver_phone'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons material-icons">home</i>
            </span>
            <label>Address</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_driver_address', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['driver_address'] ) ? $meta['driver_address'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
</div>
