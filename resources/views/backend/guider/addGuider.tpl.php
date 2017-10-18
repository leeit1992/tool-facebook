<div id="atl-page-handle-guider">
    <form action="<?php echo url('/atl-admin/validate-guider') ?>" method="post" id="atl-form-guider" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_content">
                            <h2 class="heading_b">
                                <span class="uk-text-truncate"><?php echo $actionName; ?> Guider</span>
                            </h2>
                        </div>
                        <button type="submit" class="md-fab md-fab-small md-fab-success">
                            <i class="material-icons">save</i>
                        </button>
                        <?php 
                            if( !empty( $guider ) ) {
                                echo $self->renderInput( 
                                    array(
                                        'name' => 'atl_guider_id', 
                                        'type' => 'hidden', 
                                        'value' => $guider['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/atl-admin/add-guider'),
                                        'title' => 'guider'
                                    ]
                                );
                            }
                        ?>
                    </div>
                    <?php
                        View('backend/guider/layout/addGuiderBasic.tpl', [ 'guider' => $guider, 'meta' => $meta, 'locations' => $locations, 'offices' => $offices, 'guiderLocation' => $guiderLocation, 'self' => $self ]);
                    ?>
                </div>
            </div>
            <?php
                View('backend/guider/layout/sidebarRight.tpl', [ 'guider' => $guider, 'meta' => $meta, 'self' => $self ]);
            ?>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( array(
    'page-admin-guider' => assets('backend/js/page-admin-guider.min.js'),
) );
?>
