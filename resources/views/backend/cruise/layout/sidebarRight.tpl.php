<div class="uk-width-large-3-10">
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_c uk-margin-medium-bottom">Feature Image</h3>
            <div class="atl-featured-image-wrap">
                <?php 
                    if( isset( $infoCruise['cruise_feature_image'] ) ) {
                        echo '<img src="' . url( $infoCruise['cruise_feature_image'] ) . '">
                             <input type="hidden" value="' . $infoCruise['cruise_feature_image'] . '" name="atl_cruise_image">';
                    }
                ?>
            </div>
            <?php
                if( isset( $infoCruise['cruise_feature_image'] ) ) {
                    echo '<a class="atl-featured-image-js" data-image="1">Remove featured image</a>';
                }else{
                    echo '<a class="atl-featured-image-js">Set featured image</a>';
                }
            ?>
        </div>
    </div>
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_c uk-margin-medium-bottom">Gallery</h3>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 atl-featured-gallery-wrap">
                <?php 
                    if( isset( $infoCruise['cruise_gallery'] ) ) {
                        $listGallery = json_decode( $infoCruise['cruise_gallery'] );
                        foreach ($listGallery as $image) {
                            ?>
                            <div>                                
                                <a href="<?php echo url( $image ) ?>">                                    
                                    <img src="<?php echo url( $image ) ?>" alt="">
                                    <input id="1" type="hidden" value="<?php echo $image ?>" name="atl_cruise_gallery[]">
                                </a>                               
                                <span class="atl-gallery-remove">
                                    <i class="uk-icon-remove"></i>
                                </span>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
            <a href="#" class="atl-gallery-js">Choose image gallery</a>
        </div>
    </div>
</div>
