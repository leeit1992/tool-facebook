<div class="md-card-content large-padding">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-2">
            <label>Guider name *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_guider_name', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $guider['service_name'] ) ? $guider['service_name'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-width-large-1-2">
            <div class="uk-input-group">
                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                <div class="md-input-wrapper <?php echo isset( $meta['guider_birthday'] ) ? 'md-input-filled' : '' ?>">
                    <label>Birthday</label>
                    <input class="md-input" type="text" name="atl_guider_birthday" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo isset( $meta['guider_birthday'] ) ? $meta['guider_birthday'] : '' ?>">
                    <span class="md-input-bar"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <label>More description</label>
            <textarea class="md-input" name="atl_guider_desc" cols="30" rows="3"><?php echo isset( $guider['service_description'] ) ? $guider['service_description'] : '' ?></textarea>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-large-1-2">
            <label>Choose location</label>
            <select name="atl_guider_location[]" data-md-selectize multiple>
                <option value=""> Location </option>
                <?php
                foreach ($locations as $key => $value) :
                    $selected = '';
                    if( isset( $guiderLocation ) ) {
                        if( in_array( $value['id'], $guiderLocation ) ) {
                            $selected = 'selected';
                        }
                    }
                ?>
                <option <?php echo $selected ?> value="<?php echo $value['id'] ?>"> <?php echo $value['location_name_display'];?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="uk-width-large-1-2">
            <label>Office</label>
            <select name="atl_guider_office" data-md-selectize>
                <option value="">Select...</option>
                <?php
                foreach ($offices as $office) {
                    $selected = isset( $meta['guider_office'] ) ? selected( $meta['guider_office'], $office['id'] ) : '';
                ?>
                    <option <?php echo $selected ?> value="<?php echo $office['id']; ?>"> <?php echo $office['office_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-envelope"></i>
            </span>
            <label>Email *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_guider_email', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['guider_email'] ) ? $meta['guider_email'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
            </span>
            <label>Phone Number *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_guider_phone', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['guider_phone'] ) ? $meta['guider_phone'] : ''
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
                        'name'  => 'atl_guider_address', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['guider_address'] ) ? $meta['guider_address'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-globe"></i>
            </span>
            <label>Language *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_guider_language', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['guider_language'] ) ? $meta['guider_language'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-credit-card"></i>
            </span>
            <label>ATM</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_guider_atm', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['guider_atm'] ) ? $meta['guider_atm'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
</div>
