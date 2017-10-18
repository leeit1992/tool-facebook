<div id="atl-page-handle-driver">
    <form action="<?php echo url('/atl-admin/validate-driver') ?>" method="post" id="atl-form-driver" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_content">
                            <h2 class="heading_b">
                                <span class="uk-text-truncate"><?php echo $actionName; ?> Driver</span>
                            </h2>
                        </div>
                        <button type="submit" class="md-fab md-fab-small md-fab-success">
                            <i class="material-icons">save</i>
                        </button>
                        <?php
                            if( !empty( $driver ) ) {
                                echo $self->renderInput( 
                                    array(
                                        'name' => 'atl_driver_id', 
                                        'type' => 'hidden', 
                                        'value' => $driver['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/atl-admin/add-driver'),
                                        'title' => 'driver'
                                    ]
                                );
                            }
                        ?>
                    </div>
                    <?php
                        View('backend/driver/layout/addDriverBasic.tpl', [ 'driver' => $driver, 'meta' => $meta, 'locations' => $locations, 'driverLocation' => $driverLocation, 'self' => $self ]);
                    ?>
                </div>
            </div>
            <?php
                View('backend/driver/layout/sidebarRight.tpl', [ 'driver' => $driver, 'meta' => $meta, 'self' => $self ]);
            ?>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( array(
    'page-admin-driver' => assets('backend/js/page-admin-driver.min.js'),
) );
?>

