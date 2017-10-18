<div id="atl-page-handle-partner">
    <form action="<?php echo url('/atl-admin/validate-partner') ?>" method="post" id="atl-form-partner" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <?php 
                        View(
                            'backend/partner/layout/addPartnerHead.tpl', 
                            ['actionName' => $actionName] 
                        );
                        View('backend/partner/layout/addPartnerInfo.tpl', ['partner' => $partner, 'social' => $social, 'meta' => $meta, 'self' => $self] );
                    ?>
                </div>
                <div class="md-card">
                    <?php   
                        View('backend/partner/layout/addPartnerService.tpl', 
                            ['partner' => $partner , 'service' => $service, 'self' => $self] 
                        );
                    ?>
                </div>
            </div>
            <div class="uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-content">
                        <?php 
                            if( !empty( $partner ) ) {
                                echo $self->renderInput( 
                                    array( 
                                        'name' => 'atl_partner_id', 
                                        'type' => 'hidden', 
                                        'value' => $partner['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/atl-admin/add-partner'),
                                        'title' => 'partner'
                                    ]
                                );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>

<?php 
    registerScrips( array(
        'page-admin-partner' => assets('backend/js/page-admin-partner.min.js'),
    ) );
