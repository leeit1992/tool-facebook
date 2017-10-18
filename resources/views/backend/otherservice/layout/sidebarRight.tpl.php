<div class="uk-width-large-3-10">
    <div class="md-card">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                Feature Image
            </h3>
        </div>
        <?php
            if( !empty( $OtherService['otherservice_feature'] ) ) {
                echo $self->renderInput( 
                    array( 
                        'name' => 'atl_otherservice_feature', 
                        'type' => 'hidden', 
                        'value' => $OtherService['otherservice_feature']
                    ) 
                );
            }
        ?>
        <div class="md-card-content">
            <?php if (!empty($OtherService['otherservice_feature'])) { ?>
                <div class="atl-feature-image-wrap">
                    <img src="<?php echo url($OtherService['otherservice_feature']);?>">
                        <input type="hidden" value="<?php echo $OtherService['otherservice_feature'];?>" name="atl_otherservice_feature">
                </div>
                <a class="atl-feature-image-js"> Change feature image</a>                            
            <?php }else{ ?>
                    <div class="atl-feature-image-wrap">
                        
                    </div>
                    <a class="atl-feature-image-js"> Chosse feature image</a> 
                <?php } ?>
        </div>
    </div>
    <div class="md-card">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                 Gallery Image
            </h3>
        </div>
        <div class="md-card-content">
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 atl-featured-gallery-wrap">
                <?php 
                    foreach ($gallerys as $gallery) {
                    ?>
                    <div>
                        <a href="<?php echo url($gallery); ?>">
                        <img src="<?php echo url($gallery); ?>" alt="">
                        <input type="hidden" value="<?php echo $gallery; ?>" name="atl_otherservice_gallery[]">
                        </a>
                        <span class="atl-gallery-remove"><i class="uk-icon-remove"></i></span>
                    </div>
                <?php 
                    } ?>
            </div>
            <a href="#" class="atl-gallery-js">Choose image gallery</a>
        </div>
    </div>
</div>
