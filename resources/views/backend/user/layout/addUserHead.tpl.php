<div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
    <div class="user_heading_content">
        <h2 class="heading_b">
            <span class="uk-text-truncate"><?php echo $actionName; ?></span>
            <span class="sub-heading">
            <?php 
                if( isset( $meta['user_role'] ) ) {
                    echo $mdUser->getRoleUser( $meta['user_role'] );
                }
            ?> 
            </span>
        </h2>
    </div>
    <button type="submit" class="md-fab md-fab-small md-fab-success">
        <i class="material-icons">save</i>
    </button>
</div>
