<div class="uk-width-large-3-10">
    <div class="md-card">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                Avatar Image
            </h3>
        </div>
        <div class="md-card-content">
            <?php
                if( !empty( $meta['driver_avatar'] ) ) {
                    echo $self->renderInput( 
                        array( 
                            'name' => 'atl_driver_avatar', 
                            'type' => 'hidden', 
                            'value' => $meta['driver_avatar']
                        ) 
                    );
                }
            ?>
            <?php if (!empty($meta['driver_avatar'])) { ?>
                <div class="atl-featured-image-wrap">
                    <img src="<?php echo url($meta['driver_avatar']);?>">
                        <input type="hidden" value="<?php echo $meta['driver_avatar'];?>" name="atl_driver_avatar">
                </div>
                <a class="atl-featured-image-js"> Change avatar image</a>                            
            <?php }else{ ?>
                    <div class="atl-featured-image-wrap">
                        
                    </div>
                    <a class="atl-featured-image-js"> Chosse avatar image</a> 
                <?php } ?>
        </div>
    </div>
</div>
