<div class="md-card-content large-padding">
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-2">
            <label>Partner name *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_partner_name', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $partner['partner_name'] ) ? $partner['partner_name'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-width-large-1-2">
            <label>Tax code</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_partner_tax', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $meta['partner_tax'] ) ? $meta['partner_tax'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <label>More description *</label>
            <textarea class="md-input atl-required-js" name="atl_partner_desc" cols="30" rows="3"><?php echo isset( $partner['partner_description'] ) ? $partner['partner_description'] : '' ?></textarea>
        </div>
    </div>
    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons material-icons">home</i>
            </span>
            <label>Address *</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_partner_address', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['partner_address'] ) ? $meta['partner_address'] : ''
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
                        'name'  => 'atl_partner_phone', 
                        'type'  => 'text', 
                        'class' => 'md-input atl-required-js',
                        'value' => isset( $meta['partner_phone'] ) ? $meta['partner_phone'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-facebook-official"></i>
            </span>
            <label>Facebook</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_partner_social[fb]', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $social['fb'] ) ? $social['fb'] : ''
                    )
                ); 
            ?>
        </div>
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon uk-icon-globe"></i>
            </span>
            <label>Website</label>
            <?php 
                echo $self->renderInput( 
                    array( 
                        'name'  => 'atl_partner_social[website]', 
                        'type'  => 'text', 
                        'class' => 'md-input',
                        'value' => isset( $social['website'] ) ? $social['website'] : ''
                    )
                ); 
            ?>
        </div>
    </div>
</div>
