<div id="atl-page-handle-office">
    <form action="<?php echo url('/atl-admin/validate-office') ?>" method="post" id="atl-form-office" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <?php 
                        View(
                            'backend/office/layout/addOfficeHead.tpl', 
                            ['actionName' => $actionName] 
                        );
                        View('backend/office/layout/addOfficeInfo.tpl', ['office' => $office, 'meta' => $meta, 'country' => $country ,  'officeCountry' => $officeCountry , 'officeCity' => $officeCity ,'city' => $city,'self' => $self] );
                    ?>
                </div>
                <?php 
                    if( !empty( $office ) ) {
                        echo $self->renderInput( 
                            array( 
                                'name' => 'atl_office_id', 
                                'type' => 'hidden', 
                                'value' => $office['id']
                            ) 
                        );
                        View(
                            $addButton,
                            [
                                'link' => url('/atl-admin/add-office'),
                                'title' => 'office'
                            ]
                        );
                    }
                ?>
            </div>
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;" data-notify="<?php echo isset( $notify[0] ) ? $notify[0] : ''; ?>"></div>
</div>

<?php 
    registerScrips( array(
        'page-admin-office' => assets('backend/js/page-admin-office.min.js'),
    ) );
