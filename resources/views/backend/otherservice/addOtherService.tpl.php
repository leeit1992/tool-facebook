<div id="atl-page-handle-otherservice">
    <form action="<?php echo url('/atl-admin/validate-otherservice') ?>" method="post" id="atl-form-otherservice" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_content">
                            <h2 class="heading_b">
                                <span class="uk-text-truncate"><?php echo $actionName; ?> Other Service</span>
                            </h2>
                        </div>
                        <button type="submit" class="md-fab md-fab-small md-fab-success">
                            <i class="material-icons">save</i>
                        </button>
                        <?php 
                            if( !empty( $OtherService ) ) {
                                echo $self->renderInput( 
                                    array(
                                        'name' => 'atl_otherservice_id', 
                                        'type' => 'hidden', 
                                        'value' => $OtherService['id']
                                    ) 
                                );
                                View(
                                    $addButton,
                                    [
                                        'link' => url('/atl-admin/add-otherservice'),
                                        'title' => 'service other'
                                    ]
                                );
                            }
                        ?>
                    </div>
                    <div class="md-card-content medium-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Other Service name *</label>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_otherservice_name', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $OtherService['service_name'] ) ? $OtherService['service_name'] : ''
                                            )
                                        ); 
                                    ?>
                                </div>
                                <div class="uk-form-row">
                                    <label>Partner Service</label>
                                    <select name="atl_otherservice_partner" data-md-selectize>
                                        <option value="">Select...</option>
                                        <?php
                                        foreach ($partners as $partner) {
                                            $selected = isset( $OtherService['otherservice_partner'] ) ? selected( $OtherService['otherservice_partner'], $partner['id'] ) : '';
                                        ?>
                                            <option <?php echo $selected ?> value="<?php echo $partner['id']; ?>"> <?php echo $partner['partner_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="uk-form-row">
                                    <label>Price Service ( USD )</label>
                                    <?php
                                        echo $self->renderInput( 
                                            array( 
                                                'type'  => 'text',
                                                'name'  => 'atl_otherservice_price', 
                                                'class' => 'md-input masked_input atl-required-js',
                                                'value' => isset( $OtherService['otherservice_price'] ) ? $OtherService['otherservice_price'] : '',
                                                'attr' => [
                                                    'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                    'data-inputmask-showmaskonhover' => 'false'
                                                ]
                                            )
                                        ); 
                                    ?>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Description</label>
                                    <textarea class="md-input" name="atl_otherservice_desc" cols="30" rows="7"><?php echo isset( $OtherService['service_description'] ) ? $OtherService['service_description'] : '' ?></textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    View('backend/otherservice/layout/addOtherServiceMeta.tpl', [ 'OtherService' => $OtherService, 'meta' => $meta , 'self' => $self]);
                ?>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                           Content
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-width-medium-1-1 ">
                            <?php $adminEditor->init('atl_otherservice_content', isset( $OtherService['service_content'] ) ? $OtherService['service_content'] : '') ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php
                View('backend/otherservice/layout/sidebarRight.tpl', [ 'OtherService' => $OtherService, 'gallerys' => $gallerys, 'self' => $self ]);
            ?>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>
<?php 
registerScrips( array(
    'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
    'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
    'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
    'page-admin-otherservice' => assets('backend/js/page-admin-otherservice.min.js'),
) );
?>

