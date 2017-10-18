<div class="uk-width-large-3-10">
    <div class="md-card">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                Avatar Image
            </h3>
        </div>
        <div class="md-card-content">
            <?php
                if( !empty( $meta['guider_avatar'] ) ) {
                    echo $self->renderInput( 
                        array( 
                            'name' => 'atl_guider_avatar', 
                            'type' => 'hidden', 
                            'value' => $meta['guider_avatar']
                        ) 
                    );
                }
                if( !empty( $meta['guider_licence'] ) ) {
                    echo $self->renderInput( 
                        array( 
                            'name' => 'atl_guider_licence', 
                            'type' => 'hidden', 
                            'value' => $meta['guider_licence']
                        ) 
                    );
                }
            ?>
            <?php if (!empty($meta['guider_avatar'])) { ?>
                <div class="atl-featured-image-wrap">
                    <img src="<?php echo url($meta['guider_avatar']);?>">
                        <input type="hidden" value="<?php echo $meta['guider_avatar'];?>" name="atl_guider_avatar">
                </div>
                <a class="atl-featured-image-js"> Change avatar image</a>                            
            <?php }else{ ?>
                    <div class="atl-featured-image-wrap">
                        
                    </div>
                    <a class="atl-featured-image-js"> Chosse avatar image</a> 
                <?php } ?>
        </div>
    </div>
    <div class="md-card">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                Licence Image
            </h3>
        </div>
        <div class="md-card-content">
            <?php if (!empty($meta['guider_licence'])) { ?>
                <div class="atl-licence-image-wrap">
                    <img src="<?php echo url($meta['guider_licence']);?>">
                        <input type="hidden" value="<?php echo $meta['guider_licence'];?>" name="atl_guider_licence">
                </div>
                <a class="atl-licence-image-js"> Change licence image</a>                            
            <?php }else{ ?>
                    <div class="atl-licence-image-wrap">
                        
                    </div>
                    <a class="atl-licence-image-js"> Chosse licence image</a> 
                <?php } ?>
        </div>
    </div>
</div>
