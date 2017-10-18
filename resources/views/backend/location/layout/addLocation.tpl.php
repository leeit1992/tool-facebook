<div class="uk-width-medium-4-10">
    <form action="" id="atl-form-location" method="post">
        <div class="uk-form-row">
            <div class="md-input-wrapper md-input-filled">
                <label>Location Name</label>
                <input type="text" class="md-input label-fixed atl-required-js" name="atl_location_name" value="<?php echo isset( $infoLocation['location_name'] ) ? $infoLocation['location_name'] : ''; ?>">
                <span class="md-input-bar"></span>
            </div>
            <span class="uk-form-help-block">Name of location.</span>
        </div>
        <div class="uk-form-row">
            <select name="atl_location_type" data-md-selectize>
                <option value=""> Type Location </option>
                <?php 
                    foreach ($self->mdLocation->typeLocation() as $key => $value) : 
                    $selected = isset( $infoLocation['location_type'] ) ? selected($infoLocation['location_type'], $value ) : '';
                ?>
                <option <?php echo $selected ?> value="<?php echo $key ?>"> <?php echo $value; ?> </option>
                <?php endforeach; ?>
            </select>
            <span class="uk-form-help-block">Select the type of location.</span>
        </div>
        <div class="uk-form-row">
            <select name="atl_location_parent" data-md-selectize>
                <?php $selected = isset( $infoLocation['location_parent_id'] ) ? selected($infoLocation['location_parent_id'], 0 ) : ''; ?>
                <option <?php echo $selected ?> value=""> Parent Location </option>
                <?php 
                    foreach ($locations as $key => $value) : 
                    $selected = isset( $infoLocation['location_parent_id'] ) ? selected($infoLocation['location_parent_id'], $value['id'] ) : '';
                    $lctType = isset( $infoLocation['location_type'] ) ? $infoLocation['location_type'] : '';
                ?>
                <option data-type="<?php echo $lctType; ?>" <?php echo $selected ?> value="<?php echo $value['id'] ?>"> <?php echo $value['location_name_display'];?> </option>
                <?php endforeach; ?>
            </select>
            <span class="uk-form-help-block">Select the parent's position.</span>
        </div>
        <div class="uk-form-row">
            <div class="md-input-wrapper md-input-filled">
                <label>Description Location</label>
                <textarea cols="30" rows="4" class="md-input" name="atl_location_desc"><?php echo isset( $infoLocation['location_description'] ) ? $infoLocation['location_description'] : ''; ?></textarea>
                <span class="md-input-bar"></span>
            </div>
            <span class="uk-form-help-block">Description of location.</span>
        </div>
        <?php 
            if( !empty( $infoLocation ) ) {
                echo $self->renderInput( 
                    array( 
                        'name' => 'atl_location_id', 
                        'type' => 'hidden', 
                        'value' => $infoLocation['id']
                    ) 
                );
            }
        ?>
        <div class="uk-form-row">
            <span class="uk-input-group-addon">
                <button type="submit" class="md-btn">Save</button>
            </span>
        </div>
    </form>
</div>
