<div class="md-card-content large-padding">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-2">
            <label>Office name *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_office_name', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $office['office_name'] ) ? $office['office_name'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-width-large-1-2">
            <label>Short name</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_office_shortname', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['office_shortname'] ) ? $meta['office_shortname'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <label>More description *</label>
            <textarea class="md-input atl-required-js" name="atl_office_desc" cols="30" rows="3"><?php echo isset( $office['office_description'] ) ? $office['office_description'] : '' ?></textarea>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-2">
            <label>Choose country</label>
            <select name="atl_office_country" data-md-selectize>
                <option value="">Select...</option>
                <?php
                foreach ($country as $ct) {
                    $selected = isset( $officeCountry ) ? selected( $officeCountry, $ct['id'] ) : '';
                ?>
                    <option <?php echo $selected ?> value="<?php echo $ct['id']; ?>"> <?php echo $ct['location_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="uk-width-large-1-2">
            <label>Choose city</label>
            <select name="atl_office_city" data-md-selectize>
                <option value="">Select...</option>
                <?php
                foreach ($city as $ci) {
                    $selected = isset( $officeCity ) ? selected( $officeCity, $ci['id'] ) : '';
                ?>
                    <option <?php echo $selected ?> value="<?php echo $ci['id']; ?>"> <?php echo $ci['location_name'] ?></option>
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
                        'name'  => 'atl_office_email', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['office_email'] ) ? $meta['office_email'] : ''
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
                        'name'  => 'atl_office_phone', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['office_phone'] ) ? $meta['office_phone'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons material-icons">home</i>
            </span>
            <label>Address *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_office_address', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['office_address'] ) ? $meta['office_address'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-fax"></i>
            </span>
            <label>Fax</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_office_fax', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['office_fax'] ) ? $meta['office_fax'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
</div>
