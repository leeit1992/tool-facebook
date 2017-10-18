<div id="atl-popin-room-type" class="uk-width-medium-1-1">
    <label class="uk-margin-bottom">Room Type</label>

    <span class="uk-form-help-block uk-margin-bottom">Add attach the contract file to record.</span>

    <div class="uk-accordion atl-room-type-items" data-uk-accordion="{ collapse: false }">
    <?php View('backend/accomodation/layout/roomType/listRoomType.tpl', [ 'roomType' => $roomType, 'self' => $self ] ); ?>
    </div>

    <?php View('backend/accomodation/layout/roomType/listRoomTypeJs.tpl', [ 'self' => $self ] ); ?>

    <a class="md-btn atl-btn-add-roomtype" data-uk-modal="{target:'#addRoomType'}"  data-uk-tooltip="{pos:'bottom'}"  title="Open to add room type.">Add Room Type </a>
    <div class="uk-modal" id="addRoomType">
        <div class="uk-modal-dialog uk-modal-dialog-large">
            <div id="atl-form-roomtype" action="" method="POST">
                <div class="atl-modal-head">
                    <h1>Add Room Type</h1>
                    <button type="button" class="uk-modal-close uk-close"></button>
                </div>
                
                <div class="uk-modal-content uk-margin-top">  
                    <div class="uk-grid uk-margin-top">
                        <div class="uk-width-large-7-10">
                            <p>
                                <label>Title</label>
                                <div class="md-input-wrapper">
                                    <input type="text" name="atl_roomtype_name" class="md-input atl-room-type-name-js">
                                    <span class="md-input-bar"></span>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type.</span>
                            </p>
                            <p>
                                <label>Description</label>
                                <div class="md-input-wrapper">
                                    <?php $adminEditor->init('atl_roomtype_desc', '') ?>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type.</span>
                            </p>
                            <p>
                                <label>Number of rooms</label>
                                <div class="md-input-wrapper">
                                    <input type="text" name="atl_roomtype_num" class="md-input">
                                    <span class="md-input-bar"></span>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type.</span>
                            </p>
                            <p>
                                <!-- Extra price -->
                                <div class="uk-overflow-container atl-extra-list" data-name="atl_extra_rt">
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
                                        <tbody class="atl-extra-items"> </tbody>
                                    </table>
                                    <a class="atl-add-extra" href="#"><i class="material-icons md-24">&#xE145;</i></a>
                                </div>
                                <!-- End Extra price -->
                            </p>
                            <p>
                                <input type="checkbox" id="atl-single-room" class="atl-checkbox-room" />
                                <label for="atl-single-room" class="inline-label">Single Room</label>
                            </p>
                            <p>
                                <input type="checkbox" id="atl-double-room" class="atl-checkbox-room" />
                                <label for="atl-double-room" class="inline-label">Double Room</label>
                            </p>  
                            <p>
                                <input type="checkbox" id="atl-other-room" class="atl-checkbox-room"/>
                                <label for="atl-other-room" class="inline-label">Other</label>
                            </p>
                            <!--  Manage price  -->
                                <div class="uk-overflow-container atl-manage-price-list" data-name="atl_manage_price">
                                            
                                </div>
                            <!-- End manage price-->    
                        </div>
                        <div class="uk-width-large-3-10">
                            <div class="md-card">
                                <div class="md-card-content">
                                    <h3 class="heading_c uk-margin-medium-bottom">Feature Image</h3>
                                    <div class="atl-featured-image-room-wrap">
                                                    </div>
                                    <a href="#" class="atl-rt-featured-image-js">Set featured image</a>            
                                </div>
                            </div>
                            <div class="md-card">
                                <div class="md-card-content">
                                    <h3 class="heading_c uk-margin-medium-bottom">Gallery</h3>
                                    <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 atl-featured-gallery-room-wrap">
                                                    </div>
                                    <a href="#" class="atl-rt-gallery-js">Choose image gallery</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>

                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary atl-add-roomtype-js">Save</button>
                </div>
            </div>  
        </div>
    </div>

    <div class="atl-modal atl-open" id="atlRoomTypePricing">
        <div class="atl-modal-dialog">
            <button type="button" class="atl-modal-close uk-close"></button>
            <div class="atl-modal-content uk-margin-top">
                <div class="uk-form-row">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-5">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Start Date</label>
                                <input class="md-input atl-rt-start-date-js" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                            </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="md-input-wrapper md-input-filled">
                                <label>End Date</label>
                                <input class="md-input atl-rt-end-date-js" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                            </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <div class="md-input-wrapper md-input-filled">
                                <label>Price</label>
                                <?php 
                                    echo $self->inputValidateInt( 
                                        array( 
                                            'name'  => '', 
                                            'type'  => 'text', 
                                            'class' => 'md-input masked_input atl-rt-price-js',
                                            'attr' => [
                                                'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                        ) 
                                    ); 
                                ?>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-5">
                            <button type="button" class="md-btn atl-update-price-rt-js">Update</button>
                        </div>
                        <div class="uk-width-medium-1-1 uk-margin-top">
                            <div class="atl-calendar-price uk-margin-top"></div>
                            <div class="atl-calendar-price-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>