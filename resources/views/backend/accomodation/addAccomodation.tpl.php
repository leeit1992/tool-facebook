<div id="page-admin-accommodation">
    <form id="atl-form-accommodation" action="<?php echo url('/atl-admin/validate-accomodation') ?>#" method="post" class="uk-form-stacked">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_content">
                            <h2 class="heading_b">
                            <span class="uk-text-truncate"><?php echo $actionName ?> Accommodation</span>
                            </h2>
                        </div>
                        <button type="submit" type="submit" class="md-fab md-fab-small md-fab-success" data-uk-tooltip="{pos:'left'}"  title="Save accomodation.">
                            <i class="material-icons">&#xE161;</i>
                        </button>
                        <?php 
                        if( isset( $infoAcco['id'] ) ) {
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_accomodation_id', 
                                    'type'  => 'hidden', 
                                    'class' => 'md-input',
                                    'value' => $infoAcco['id'],
                                ) 
                            ); 
                            View(
                                $addButton,
                                [
                                    'link' => url('/atl-admin/add-accomodation'),
                                    'title' => 'accomodation'
                                ]
                            );
                        }     
                        ?>
                    </div>
                    <div class="user_content" data-uk-grid-margin>

                        <?php 
                        $self->renderInputWrap(
                            array( 
                                'label' => 'Title',
                                'name'  => 'atl_accomodation_title', 
                                'type'  => 'text', 
                                'class' => 'md-input',
                                'value' => isset( $infoAcco['service_title'] ) ? $infoAcco['service_title'] : '',
                                'desc' => 'Enter the title for accomodation.'
                            ) 
                        )
                        ?>

                        <div class="uk-width-medium-1-1">
                            <?php $adminEditor->init('atl_accomodation_content', isset( $infoAcco['service_content'] ) ? $infoAcco['service_content'] : '') ?>
                            <span class="uk-form-help-block">Location of accomodation.</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php View('backend/accomodation/layout/sidebarRight.tpl', [ 'infoAcco' => $infoAcco ]); ?>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_content" data-uk-grid-margin>
                        <h3 class="heading_c uk-margin-bottom">General Settings</h3>
                       
                        <div class="uk-width-medium-1-1">
                            <label>Description</label>
                            <?php $adminEditor->init('atl_accomodation_desc', isset( $infoAcco['service_description'] ) ? $infoAcco['service_description'] : '') ?>
                        </div>

                        <?php 
                        $self->renderInputWrap(
                            array( 
                                'label' => 'Address',
                                'name'  => 'atl_accomodation_address', 
                                'type'  => 'text', 
                                'class' => 'md-input',
                                'value' => isset( $infoAcco['acmdt_address'] ) ? $infoAcco['acmdt_address'] : '',
                                'desc' => 'Enter the address for accomodation.'
                            ) 
                        );

                        $self->renderInputWrap(
                            array( 
                                'label' => 'Email',
                                'name'  => 'atl_accomodation_email', 
                                'type'  => 'text', 
                                'class' => 'md-input masked_input',
                                'value' => isset( $infoAcco['acmdt_email'] ) ? $infoAcco['acmdt_email'] : '',
                                'desc' => 'Enter the email for accomodation.',
                                'attr' => [
                                    'data-inputmask' => "'alias': 'email'",
                                    'data-inputmask-showmaskonhover' => 'false'
                                ]
                            ) 
                        );

                        $self->renderInputWrap(
                            array( 
                                'label' => 'Website',
                                'name'  => 'atl_accomodation_website', 
                                'type'  => 'text', 
                                'class' => 'md-input',
                                'value' => isset( $infoAcco['acmdt_website'] ) ? $infoAcco['acmdt_website'] : '',
                                'desc' => 'Enter the website for accomodation.'
                            ) 
                        )

                        ?>

                        <div class="uk-width-medium-1-1">
                            <label>Choose location</label>
                            <select name="atl_accomodation_location[]" data-md-selectize multiple>
                                <option value=""> Location </option>
                                <?php
                                foreach ($locations as $key => $value) :
                                    $selected = '';
                                    if( isset( $infoAcco['acmdt_location'] ) ) {
                                        $currentLocation = json_decode( $infoAcco['acmdt_location'] );
                                        if( in_array( $value['id'], $currentLocation ) ) {
                                            $selected = 'selected';
                                        }
                                    }
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $value['id'] ?>"> <?php echo $value['location_name_display'];?> </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="uk-form-help-block">Location of accomodation.</span>
                        </div>

                        <div class="uk-width-medium-1-1">
                            <label>Choose star</label>
                            <select name="atl_accomodation_star" data-md-selectize>
                                <option value="">Select...</option>
                                <?php 
                                for( $i = 1; $i <= 5; $i++ ): 
                                    $selected = isset( $infoAcco['acmdt_star'] ) ? selected( $infoAcco['acmdt_star'], $i ) : '';
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $i ?>"> <?php echo $i ?> Star </option>
                                <?php endfor; ?>
                            </select>
                            <span class="uk-form-help-block">Number star of accomodation.</span>
                        </div>

                        <div class="uk-width-medium-1-1">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Price base</label>
                                <?php 
                                    echo $self->inputValidateInt( 
                                        array( 
                                            'name'  => 'atl_accomodation_price', 
                                            'type'  => 'text', 
                                            'class' => 'md-input masked_input',
                                            'value' => isset( $infoAcco['acmdt_base_price'] ) ? $infoAcco['acmdt_base_price'] : '',
                                            'attr' => [
                                                'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                        ) 
                                    ); 
                                ?>
                            </div>
                            <span class="uk-form-help-block">Price base of accomodation.</span>
                        </div>

                        <!-- Extra price -->
                        <div class="uk-overflow-container atl-extra-list" data-name="atl_extra_acm">
                            <label>Extra price</label>
                            <table class="uk-table">
                                <thead>
                                    <tr>
                                        <th class="uk-width-4-10 uk-text-nowrap">Title</th>
                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Type</th>
                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                        <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="atl-extra-items">
                                <?php
                                if( isset( $infoAcco['acmdt_extra'] ) ) :
                                $listExtra = json_decode( $infoAcco['acmdt_extra'] );
                                foreach ($listExtra as $key => $extra) :
                                    $extraFName = 'atl_extra_acm['.$key.']'
                                ?>
                                    <tr class="atl-extra-item">
                                        <td>
                                            <input type="text" name="<?php echo $extraFName ?>[title]" class="md-input md-input-width-medium" value="<?php echo !empty($extra->title) ? $extra->title : '' ?>" placeholder="Title" />
                                        </td>
                                        <td class="uk-text-middle uk-text-center">
                                            <div class="atl-select">
                                                <select name="<?php echo $extraFName ?>[type_price]">
                                                    <option value="">Select...</option>
                                                    <?php
                                                    foreach ($mdAccm->canculatePriceBy() as $keyBy =>  $priceBy) {

                                                        $selected = (!empty($extra->type_price) && $keyBy === $extra->type_price) ? 'selected' : '';

                                                        echo '<option '.$selected.' value="'. $keyBy .'">' . $priceBy . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="uk-input-group">
                                                <?php 
                                                        echo $self->inputValidateInt( 
                                                            array( 
                                                                'name'  => $extraFName . '[price]', 
                                                                'type'  => 'text', 
                                                                'class' => 'md-input masked_input atl-rt-price-js',
                                                                'value' => !empty($extra->price) ? $extra->price : 0,
                                                                'attr' => [
                                                                    'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                                    'data-inputmask-showmaskonhover' => 'false'
                                                                ]
                                                            ) 
                                                        ); 
                                                    ?>
                                            </div>
                                        </td>
                                        <td class="uk-text-right uk-text-middle">
                                            <a class="atl-extra-remove" href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                            <a class="atl-add-extra" href="#"><i class="material-icons md-24">&#xE145;</i></a>
                        </div>
                        <!-- End Extra price -->

                        <!-- Contract -->
                        <div class="atl-contract-list">
                            <label>Contract</label>
                            <div class="uk-width-1-1">
                                <ul class="md-list md-list-addon">
                                    <?php 
                                    if( isset( $infoAcco['acmdt_contract'] ) ):
                                        $listContract = json_decode( $infoAcco['acmdt_contract'] );
                                        foreach ($listContract as $contract): 
                                        $fieldName = 'alt_accomodation_contract['. $contract->id .']';
                                    ?>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="uk-text-success md-list-addon-icon uk-icon-file-archive-o"></i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading"> <?php echo $contract->name ?> </span>
                                            <a class="uk-text-small"> 
                                                <i class="material-icons md-16">insert_drive_file</i> <?php echo $contract->file ?> 
                                            </a>
                                        </div>
                                        <div class="md-list-content">
                                            <a class="uk-text-small"> 
                                            <i class="material-icons md-16">event_available</i>
                                            Start: <?php echo $contract->date ?>

                                            <i class="material-icons md-16">event_available</i>
                                            Expiry: <?php echo $contract->expiry ?>
                                            </a>
                                        </div>

                                        <div>
                                            <a class="uk-text-success md-list-addon-icon atl-remove-contract-js">Remove</a>
                                        </div>
                                        <input name="<?php echo $fieldName ?>[name]" type="hidden" value="<?php echo $contract->name ?>">
                                        <input name="<?php echo $fieldName ?>[file]" type="hidden" value="<?php echo $contract->file ?>">
                                        <input name="<?php echo $fieldName ?>[path]" type="hidden" value="<?php echo $contract->path ?>">
                                        <input name="<?php echo $fieldName ?>[date]" type="hidden" value="<?php echo $contract->date ?>">
                                        <input name="<?php echo $fieldName ?>[expiry]" type="hidden" value="<?php echo $contract->expiry ?>">
                                        <input name="<?php echo $fieldName ?>[id]" type="hidden" value="<?php echo $contract->id ?>">
                                    </li>
                                    <?php endforeach; endif; ?>
                                </ul>
                                <span class="uk-form-help-block">Add attach the contract file to record.</span>
                            </div>
                        </div>
                        <!-- End Contract -->

                    <?php View('backend/accomodation/layout/addContactFile.tpl', [ 'self' => $self ]); ?>
                    <?php 
                        View(
                            'backend/accomodation/layout/addRoomType.tpl', 
                            [ 
                                'postId'   => $postId, 
                                'roomType' => $roomType,
                                'self'     => $self,
                                'adminEditor' => $adminEditor
                            ]
                        ); 
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
    'fullcalendar' => assets('backend/bower_components/fullcalendar/fullcalendar.min.js'),
    'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
    'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
    'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
    'extra-list' => assets('backend/js/admin-extra-list-debug.js'),
    'page-admin-accomodation' => assets('backend/js/page-admin-accommodation-debug.js'),
    'popin-room-type' => assets('backend/js/admin-popin-roomtype-debug.js'),
    
) );